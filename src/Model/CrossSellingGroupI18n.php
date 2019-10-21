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
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CrossSellingGroupI18n extends DataModel
{
    /**
     * @var Identity
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("crossSellingGroupId")
     * @Serializer\Accessor(getter="getCrossSellingGroupId",setter="setCrossSellingGroupId")
     */
    protected $crossSellingGroupId = null;
    
    /**
     * @var string Optional localized description
     * @Serializer\Type("string")
     * @Serializer\SerializedName("description")
     * @Serializer\Accessor(getter="getDescription",setter="setDescription")
     */
    protected $description = '';
    
    /**
     * @var string Locale
     * @Serializer\Type("string")
     * @Serializer\SerializedName("languageISO")
     * @Serializer\Accessor(getter="getLanguageISO",setter="setLanguageISO")
     */
    protected $languageISO = '';
    
    /**
     * @var string Localized name
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
        $this->crossSellingGroupId = new Identity();
    }
    
    /**
     * @param Identity $crossSellingGroupId
     * @return CrossSellingGroupI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCrossSellingGroupId(Identity $crossSellingGroupId): CrossSellingGroupI18n
    {
        $this->crossSellingGroupId = $crossSellingGroupId;
        
        return $this;
    }
    
    /**
     * @return Identity
     */
    public function getCrossSellingGroupId(): Identity
    {
        return $this->crossSellingGroupId;
    }
    
    /**
     * @param string $description Optional localized description
     * @return CrossSellingGroupI18n
     */
    public function setDescription(string $description): CrossSellingGroupI18n
    {
        $this->description = $description;
        
        return $this;
    }
    
    /**
     * @return string Optional localized description
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    
    /**
     * @param string $languageISO Locale
     * @return CrossSellingGroupI18n
     */
    public function setLanguageISO(string $languageISO): CrossSellingGroupI18n
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
     * @param string $name Localized name
     * @return CrossSellingGroupI18n
     */
    public function setName(string $name): CrossSellingGroupI18n
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @return string Localized name
     */
    public function getName(): string
    {
        return $this->name;
    }
}