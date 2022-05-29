<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Linker
 */

namespace Jtl\Connector\Core\Linker;

use Doctrine\Common\Annotations\AnnotationReader;
use JMS\Serializer\Annotation\Exclude;
use Jtl\Connector\Core\Definition\Model;
use Jtl\Connector\Core\Exception\DefinitionException;
use Jtl\Connector\Core\Mapper\PrimaryKeyMapperInterface;
use Jtl\Connector\Core\Model\AbstractModel;
use Jtl\Connector\Core\Exception\LinkerException;
use Jtl\Connector\Core\Model\Identity;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * Identity Connector Linker
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.com>
 */
class IdentityLinker implements LoggerAwareInterface
{
    public const
        CACHE_TYPE_HOST = 'h',
        CACHE_TYPE_ENDPOINT = 'e';

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * Session Database Mapper
     *
     * @var PrimaryKeyMapperInterface
     */
    protected $mapper;

    /**
     * @var bool
     */
    protected $useCache = true;

    /**
     * @var array
     */
    protected $cache = [];

    /**
     * IdentityLinker constructor.
     * @param PrimaryKeyMapperInterface $mapper
     */
    public function __construct(PrimaryKeyMapperInterface $mapper)
    {
        $this->logger = new NullLogger();
        $this->mapper = $mapper;
    }

    /**
     * Constructor
     *
     * @param boolean $useCache
     * @return IdentityLinker
     */
    public function setUseCache(bool $useCache): IdentityLinker
    {
        $this->useCache = $useCache;
        return $this;
    }

    /**
     * @param AbstractModel $model
     * @param boolean $isDeleted
     * @throws DefinitionException
     * @throws LinkerException
     * @throws \ReflectionException
     */
    public function linkModel(AbstractModel $model, bool $isDeleted = false): void
    {
        $reflect = new \ReflectionClass($model);
        $modelName = $reflect->getShortName();

        foreach ($reflect->getProperties(\ReflectionProperty::IS_PROTECTED) as $propertyInfo) {
            $propertyName = $propertyInfo->getName();
            $getter = sprintf('get%s', ucfirst($propertyName));

            if (is_callable([$model, $getter])) {
                $value = $model->{$getter}();
                if (!is_array($value)) {
                    $value = [$value];
                }

                foreach ($value as $entity) {
                    if ($entity instanceof Identity && Model::isIdentityProperty($modelName, $propertyName)) {
                        $this->linkIdentity($entity, $modelName, $propertyName, $isDeleted);
                    } elseif ($entity instanceof AbstractModel) {
                        $this->linkModel($entity, $isDeleted);
                    }
                }
            }
        }
    }

    /**
     * @param Identity $identity
     * @param string $modelName
     * @param string $propertyName
     * @param bool $isDeleted
     * @throws DefinitionException
     * @throws LinkerException
     * @throws \ReflectionException
     */
    public function linkIdentity(Identity $identity, string $modelName, string $propertyName, bool $isDeleted = false): void
    {
        $endpoint = $identity->getEndpoint();
        $host = $identity->getHost();
        $identityType = Model::getPropertyIdentityType($modelName, $propertyName);

        if (strlen($endpoint) > 0 && $host > 0) {
            if ($isDeleted) {
                $this->delete($modelName, $endpoint, $host);
            } elseif (!$this->propertyHostIdExists($modelName, $propertyName, $host) || $this->loadCache($host, $identityType, self::CACHE_TYPE_HOST) !== $endpoint) {
                $this->save($endpoint, $host, $modelName, $propertyName);
            }
        } else {
            if ($host > 0) {
                if ($isDeleted) {
                    $this->delete($modelName, null, $host);
                } elseif ($this->propertyHostIdExists($modelName, $propertyName, $host)) {
                    $identity->setEndpoint($this->getEndpointId($modelName, $propertyName, $host));
                }
            } elseif (strlen($endpoint) > 0) {
                if ($isDeleted) {
                    $this->delete($modelName, $endpoint);
                } elseif ($this->propertyEndpointIdExists($modelName, $propertyName, $endpoint)) {
                    $identity->setHost($this->getHostId($modelName, $propertyName, $endpoint));
                }
            }
        }
    }

    /**
     * @param string $modelName
     * @param string $property
     * @param int $hostId
     * @return bool
     * @throws DefinitionException
     * @throws LinkerException
     * @throws \ReflectionException
     */
    public function propertyHostIdExists(string $modelName, string $property, int $hostId): bool
    {
        if (!$this->isValidHostId($hostId)) {
            throw new LinkerException(sprintf(
                'HostId (%s) => (modelName: %s, property: %s) is invalid.',
                $hostId,
                $modelName,
                $property
            ));
        }

        $identityType = Model::getPropertyIdentityType($modelName, $property);
        $modelName = Model::getModelByType($identityType);
        return $this->hostIdExists($modelName, $hostId);
    }

    /**
     * @param string $modelName
     * @param integer $hostId
     * @return boolean
     * @throws DefinitionException
     * @throws LinkerException
     */
    public function hostIdExists(string $modelName, int $hostId): bool
    {
        if (!$this->isValidHostId($hostId)) {
            throw new LinkerException(sprintf(
                'HostId (%s) => (modelName: %s) is invalid.',
                $hostId,
                $modelName
            ));
        }

        $identityType = Model::getIdentityType($modelName);
        if (!$this->checkCache($hostId, $identityType, self::CACHE_TYPE_HOST)) {
            $endpointId = $this->mapper->getEndpointId($identityType, $hostId);
            if (!$this->isValidEndpointId($endpointId)) {
                return false;
            }
            $this->saveCache($endpointId, $hostId, $identityType, self::CACHE_TYPE_HOST);
        }

        return true;
    }

    /**
     * @param string $modelName
     * @param string $property
     * @param string $endpointId
     * @return bool
     * @throws DefinitionException
     * @throws LinkerException
     * @throws \ReflectionException
     */
    public function propertyEndpointIdExists(string $modelName, string $property, string $endpointId): bool
    {
        if (!$this->isValidEndpointId($endpointId)) {
            throw new LinkerException(sprintf(
                'EndpointId (%s) => (modelName: %s, property: %s) is invalid.',
                $endpointId,
                $modelName,
                $property
            ));
        }

        $identityType = Model::getPropertyIdentityType($modelName, $property);
        $modelName = Model::getModelByType($identityType);
        return $this->endpointIdExists($modelName, $endpointId);
    }

    /**
     * @param string $modelName
     * @param string $endpointId
     * @return boolean
     * @throws LinkerException
     * @throws DefinitionException
     */
    public function endpointIdExists(string $modelName, string $endpointId): bool
    {
        if (!$this->isValidEndpointId($endpointId)) {
            throw new LinkerException(sprintf(
                'EndpointId (%s) => (modelName: %s) is invalid.',
                $endpointId,
                $modelName
            ));
        }

        $identityType = Model::getIdentityType($modelName);
        if (!$this->checkCache($endpointId, $identityType, self::CACHE_TYPE_ENDPOINT)) {
            $hostId = $this->mapper->getHostId($identityType, $endpointId);
            if (!$this->isValidHostId($hostId)) {
                return false;
            }
            $this->saveCache($endpointId, $hostId, $identityType, self::CACHE_TYPE_ENDPOINT);
        }

        return true;
    }

    /**
     * @param string $endpointId
     * @param int $hostId
     * @param string $modelName
     * @param string|null $property
     * @return bool
     * @throws DefinitionException
     * @throws \ReflectionException
     */
    public function save(string $endpointId, int $hostId, string $modelName, string $property = null): bool
    {
        $identityType = is_null($property) ? Model::getIdentityType($modelName) : Model::getPropertyIdentityType($modelName, $property);
        $relatedModel = Model::getModelByType($identityType);
        $this->delete($relatedModel, $endpointId, $hostId);

        $result = $this->mapper->save($identityType, $endpointId, $hostId);
        if ($result) {
            $this->saveCache($endpointId, $hostId, $identityType, self::CACHE_TYPE_ENDPOINT);
            $this->saveCache($endpointId, $hostId, $identityType, self::CACHE_TYPE_HOST);

            return true;
        }

        return false;
    }

    /**
     * @param string $modelName
     * @param string|null $endpointId
     * @param integer|null $hostId
     * @return boolean
     * @throws DefinitionException|\ReflectionException
     */
    public function delete(string $modelName, string $endpointId = null, int $hostId = null): bool
    {
        $identityType = Model::getIdentityType($modelName);

        $result = $this->mapper->delete($identityType, $endpointId, $hostId);
        if ($result) {
            $this->deleteCache($identityType, self::CACHE_TYPE_ENDPOINT, $endpointId, null);
            $this->deleteCache($identityType, self::CACHE_TYPE_HOST, null, $hostId);

            return true;
        }

        return false;
    }

    /**
     * Clears the entire link table
     * @param int|null $identityType
     * @return boolean
     */
    public function clear(int $identityType = null): bool
    {
        return $this->mapper->clear($identityType);
    }

    /**
     * @param string $modelName
     * @param string $property
     * @param integer $hostId
     * @return string
     * @throws DefinitionException|\ReflectionException
     */
    public function getEndpointId(string $modelName, string $property, int $hostId): string
    {
        $identityType = Model::getPropertyIdentityType($modelName, $property);
        if (($endpointId = $this->loadCache($hostId, $identityType, self::CACHE_TYPE_HOST)) !== null) {
            return $endpointId;
        }

        $endpointId = (string)$this->mapper->getEndpointId($identityType, $hostId);

        if (strlen(trim($endpointId)) > 0) {
            $this->saveCache($endpointId, $hostId, $identityType, self::CACHE_TYPE_HOST);
        }

        return $endpointId;
    }

    /**
     * @param string $modelName
     * @param string $property
     * @param string $endpointId
     * @return integer
     * @throws DefinitionException
     */
    public function getHostId(string $modelName, string $property, string $endpointId): int
    {
        $identityType = Model::getPropertyIdentityType($modelName, $property);

        if (($hostId = $this->loadCache($endpointId, $identityType, self::CACHE_TYPE_ENDPOINT)) !== null) {
            return $hostId;
        }

        $hostId = (int)$this->mapper->getHostId($identityType, $endpointId);

        if ($hostId > 0) {
            $this->saveCache($endpointId, $hostId, $identityType, self::CACHE_TYPE_ENDPOINT);
        }

        return $hostId;
    }

    /**
     * @param mixed $endpointId
     * @return boolean
     */
    public function isValidEndpointId(?string $endpointId): bool
    {
        return !is_null($endpointId) && strlen(trim($endpointId)) > 0;
    }

    /**
     * @param mixed $hostId
     * @return boolean
     */
    public function isValidHostId(?int $hostId): bool
    {
        return !is_null($hostId) && $hostId > 0;
    }

    /**
     * @return array
     */
    public function getCache(): array
    {
        return $this->cache;
    }

    /**
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger):void
    {
        $this->logger = $logger;
    }

    /**
     * @param mixed $id
     * @param integer $identityType
     * @param string $cacheType
     * @return boolean
     */
    protected function checkCache($id, int $identityType, string $cacheType): bool
    {
        $result = $this->useCache && array_key_exists($this->buildKey($id, $identityType, $cacheType), $this->cache);

        $context = [
            'id' => $id,
            'identityType' => $identityType,
            'cacheType' => $cacheType,
            'result' => $result ? 'true' : 'false',
        ];

        $this->logger->debug('CheckCache (id: {id}, identityType: {identityType}, cacheType: {cacheType}) with result {result}', $context);

        return $result;
    }

    /**
     * @param mixed $id
     * @param int $identityType
     * @param string $cacheType
     * @return mixed
     */
    protected function loadCache($id, int $identityType, string $cacheType)
    {
        $result = $this->checkCache($id, $identityType, $cacheType) ? $this->cache[$this->buildKey($id, $identityType, $cacheType)] : null;

        $context = [
            'id' => $id,
            'identityType' => $identityType,
            'cacheType' => $cacheType,
            'result' => $result ? 'true' : 'false',
        ];

        $this->logger->debug('LoadCache (id: {id}, identityType: {identityType}, cacheType: {cacheType}) with result {result}', $context);

        return $result;
    }

    /**
     * @param mixed $endpointId
     * @param int $hostId
     * @param int $identityType
     * @param string $cacheType
     */
    protected function saveCache(string $endpointId, int $hostId, int $identityType, string $cacheType)
    {
        $context = [
            'endpoint' => $endpointId,
            'host' => $hostId,
            'identityType' => $identityType,
            'cacheType' => $cacheType
        ];

        $this->logger->debug('SaveCache (endpointId: {endpoint}, hostId: {host}, identityType: {identityType}, cacheType: {cacheType})', $context);

        if ($this->useCache) {
            switch ($cacheType) {
                case self::CACHE_TYPE_ENDPOINT:
                    $this->cache[$this->buildKey($endpointId, $identityType, $cacheType)] = $hostId;
                    break;
                case self::CACHE_TYPE_HOST:
                    $this->cache[$this->buildKey($hostId, $identityType, $cacheType)] = $endpointId;
                    break;
            }
        }
    }

    /**
     * @param int $identityType
     * @param string $cacheType
     * @param string|null $endpointId
     * @param int|null $hostId
     */
    protected function deleteCache(int $identityType, string $cacheType, string $endpointId = null, int $hostId = null)
    {
        $context = [
            'endpoint' => $endpointId,
            'host' => $hostId,
            'identityType' => $identityType,
            'cacheType' => $cacheType
        ];

        $this->logger->debug('DeleteCache (endpointId: {endpoint}, hostId: {host}, identityType: {identityType}, cacheType: {cacheType})', $context);

        if ($this->useCache) {
            switch ($cacheType) {
                case self::CACHE_TYPE_ENDPOINT:
                    unset($this->cache[$this->buildKey($endpointId, $identityType, $cacheType)]);
                    break;
                case self::CACHE_TYPE_HOST:
                    unset($this->cache[$this->buildKey($hostId, $identityType, $cacheType)]);
                    break;
            }
        }
    }

    /**
     * @param mixed $id
     * @param int $identityType
     * @param string $cacheType
     * @return string
     */
    protected function buildKey($id, int $identityType, string $cacheType): string
    {
        return sprintf('%s_%s_%s', $cacheType, $id, $identityType);
    }
}
