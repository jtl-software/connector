<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * ProductAttrI18n Model
 * @access public
 */
abstract class ProductAttrI18n extends Model
{
    /**
     * @var int
     */
    protected $_languageIso;
    
    /**
     * @var int
     */
    protected $_productAttrId;
    
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * @var string
     */
    protected $_value;
    
    /**
     * @param int $languageIso
     * @return \jtl\Connector\Model\ProductAttrI18n
     */
    public function setLanguageIso($languageIso)
    {
        $this->_languageIso = (int)$languageIso;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getLanguageIso()
    {
        return $this->_languageIso;
    }
    
    /**
     * @param int $productAttrId
     * @return \jtl\Connector\Model\ProductAttrI18n
     */
    public function setProductAttrId($productAttrId)
    {
        $this->_productAttrId = (int)$productAttrId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getProductAttrId()
    {
        return $this->_productAttrId;
    }
    
    /**
     * @param string $name
     * @return \jtl\Connector\Model\ProductAttrI18n
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }
    
    /**
     * @param string $value
     * @return \jtl\Connector\Model\ProductAttrI18n
     */
    public function setValue($value)
    {
        $this->_value = (string)$value;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getValue()
    {
        return $this->_value;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/ProductAttrI18n/ProductAttrI18n.json", $this->getPublic(array()));
    }
}
?>