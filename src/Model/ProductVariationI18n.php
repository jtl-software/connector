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
 * Locale specific product variation properties.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductVariationI18n extends DataModel
{
    /**
     * @var Identity Reference to productVariation
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("productVariationId")
     * @Serializer\Accessor(getter="getProductVariationId",setter="setProductVariationId")
     */
    protected $productVariationId = null;
    
    /**
     * @var string Locale
     * @Serializer\Type("string")
     * @Serializer\SerializedName("languageISO")
     * @Serializer\Accessor(getter="getLanguageISO",setter="setLanguageISO")
     */
    protected $languageISO = '';
    
    /**
     * @var string Locale specific variation name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productVariationId = new Identity();
    }
    
    /**
     * @param Identity $productVariationId Reference to productVariation
     * @return ProductVariationI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductVariationId(Identity $productVariationId): ProductVariationI18n
    {
        $this->productVariationId = $productVariationId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to productVariation
     */
    public function getProductVariationId(): Identity
    {
        return $this->productVariationId;
    }
    
    /**
     * @param string $languageISO Locale
     * @return ProductVariationI18n
     */
    public function setLanguageISO(string $languageISO): ProductVariationI18n
    {
        $this->languageISO = $languageISO;
        
        return $this;
    }
    
    /**
     * @return string Locale
     */
    public function getLanguageISO(): string
    {
        return $this->languageISO;
    }
    
    /**
     * @param string $name Locale specific variation name
     * @return ProductVariationI18n
     */
    public function setName(string $name): ProductVariationI18n
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @return string Locale specific variation name
     */
    public function getName(): string
    {
        return $this->name;
    }
}