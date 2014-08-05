<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * Product to specificValue Assignment. Product specifics are used to assign characteristic product attributes like color or  size... When different products have common specifics, products are similar. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @JMS\AccessType("public_method")
 */
class ProductSpecific extends DataModel
{
    /**
     * @var Identity Unique productSpecific id
	 * @JMS\Type("\jtl\Connector\Model\Identity")
     */
    protected $id = null;

    /**
     * @var Identity Reference to product
	 * @JMS\Type("\jtl\Connector\Model\Identity")
     */
    protected $productId = null;

    /**
     * @var Identity Reference to specificValue
	 * @JMS\Type("\jtl\Connector\Model\Identity")
     */
    protected $specificValueId = null;

    /**
     * @param  Identity $id Unique productSpecific id
     * @return \jtl\Connector\Model\ProductSpecific
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }

    /**
     * @return Identity Unique productSpecific id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $productId Reference to product
     * @return \jtl\Connector\Model\ProductSpecific
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('productId', $productId, 'Identity');
    }

    /**
     * @return Identity Reference to product
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param  Identity $specificValueId Reference to specificValue
     * @return \jtl\Connector\Model\ProductSpecific
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSpecificValueId(Identity $specificValueId)
    {
        return $this->setProperty('specificValueId', $specificValueId, 'Identity');
    }

    /**
     * @return Identity Reference to specificValue
     */
    public function getSpecificValueId()
    {
        return $this->specificValueId;
    }

 
}
