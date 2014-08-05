<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * Localized Measurement Unit Name.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 * @JMS\AccessType("public_method")
 */
class MeasurementUnitI18n extends DataModel
{
    /**
     * @var Identity Reference to measurementUnitId
	 * @JMS\Type("\jtl\Connector\Model\Identity")
     */
    protected $measurementUnitId = null;

    /**
     * @var string Locale
	 * @JMS\Type("string")
     */
    protected $localeName = '';

    /**
     * @var string Localized Name
	 * @JMS\Type("string")
     */
    protected $name = '';

    /**
     * @param  Identity $measurementUnitId Reference to measurementUnitId
     * @return \jtl\Connector\Model\MeasurementUnitI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMeasurementUnitId(Identity $measurementUnitId)
    {
        return $this->setProperty('measurementUnitId', $measurementUnitId, 'Identity');
    }

    /**
     * @return Identity Reference to measurementUnitId
     */
    public function getMeasurementUnitId()
    {
        return $this->measurementUnitId;
    }

    /**
     * @param  string $localeName Locale
     * @return \jtl\Connector\Model\MeasurementUnitI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setLocaleName($localeName)
    {
        return $this->setProperty('localeName', $localeName, 'string');
    }

    /**
     * @return string Locale
     */
    public function getLocaleName()
    {
        return $this->localeName;
    }

    /**
     * @param  string $name Localized Name
     * @return \jtl\Connector\Model\MeasurementUnitI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }

    /**
     * @return string Localized Name
     */
    public function getName()
    {
        return $this->name;
    }

 
}
