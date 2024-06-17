<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ConnectorServerInfo extends AbstractModel
{
    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("memoryLimit")
     * @Serializer\Accessor(getter="getMemoryLimit",setter="setMemoryLimit")
     */
    protected int $memoryLimit = 0;

    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("executionTime")
     * @Serializer\Accessor(getter="getExecutionTime",setter="setExecutionTime")
     */
    protected int $executionTime = 0;

    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("postMaxSize")
     * @Serializer\Accessor(getter="getPostMaxSize",setter="setPostMaxSize")
     */
    protected int $postMaxSize = 0;

    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("uploadMaxFilesize")
     * @Serializer\Accessor(getter="getUploadMaxFilesize",setter="setUploadMaxFilesize")
     */
    protected int $uploadMaxFilesize = 0;

    /**
     * @return integer
     */
    public function getMemoryLimit(): int
    {
        return $this->memoryLimit;
    }

    /**
     * @param integer $memoryLimit
     *
     * @return $this
     */
    public function setMemoryLimit(int $memoryLimit): self
    {
        $this->memoryLimit = $memoryLimit;

        return $this;
    }

    /**
     * @return int
     */
    public function getExecutionTime(): int
    {
        return $this->executionTime;
    }

    /**
     * @param integer $executionTime
     *
     * @return $this
     */
    public function setExecutionTime(int $executionTime): self
    {
        $this->executionTime = $executionTime;

        return $this;
    }

    /**
     * @return int
     */
    public function getPostMaxSize(): int
    {
        return $this->postMaxSize;
    }

    /**
     * @param integer $postMaxSize
     *
     * @return $this
     */
    public function setPostMaxSize(int $postMaxSize): self
    {
        $this->postMaxSize = $postMaxSize;

        return $this;
    }

    /**
     * @return int
     */
    public function getUploadMaxFilesize(): int
    {
        return $this->uploadMaxFilesize;
    }

    /**
     * @param integer $uploadMaxFilesize
     *
     * @return $this
     */
    public function setUploadMaxFilesize(int $uploadMaxFilesize): self
    {
        $this->uploadMaxFilesize = $uploadMaxFilesize;

        return $this;
    }
}
