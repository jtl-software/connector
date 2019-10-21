<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;

/**
 * Specify cross-sold products that are in a common crossSellingGroup.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CrossSellingItem extends DataModel
{
    /**
     * @var Identity Reference to crossSellingGroup
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("crossSellingGroupId")
     * @Serializer\Accessor(getter="getCrossSellingGroupId",setter="setCrossSellingGroupId")
     */
    protected $crossSellingGroupId = null;
    
    /**
     * @var Identity[] Referenced target product ID
     * @Serializer\Type("array<jtl\Connector\Model\Identity>")
     * @Serializer\SerializedName("productIds")
     * @Serializer\AccessType("reflection")
     */
    protected $productIds = [];
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->crossSellingGroupId = new Identity();
    }
    
    /**
     * @param Identity $crossSellingGroupId Reference to crossSellingGroup
     * @return CrossSellingItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCrossSellingGroupId(Identity $crossSellingGroupId): CrossSellingItem
    {
        $this->crossSellingGroupId = $crossSellingGroupId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to crossSellingGroup
     */
    public function getCrossSellingGroupId(): Identity
    {
        return $this->crossSellingGroupId;
    }
    
    /**
     * @param Identity $productId
     * @return CrossSellingItem
     */
    public function addProductId(Identity $productId): CrossSellingItem
    {
        $this->productIds[] = $productId;
        
        return $this;
    }
    
    /**
     * @param array $productIds
     * @return CrossSellingItem
     */
    public function setProductIds(array $productIds): CrossSellingItem
    {
        $this->productIds = $productIds;
        
        return $this;
    }
    
    /**
     * @return Identity[]
     */
    public function getProductIds(): array
    {
        return $this->productIds;
    }
    
    /**
     * @return CrossSellingItem
     */
    public function clearProductIds(): CrossSellingItem
    {
        $this->productIds = [];
        
        return $this;
    }
}