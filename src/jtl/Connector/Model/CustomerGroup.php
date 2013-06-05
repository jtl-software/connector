<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CustomerGroup Model
 * @access public
 */
class CustomerGroup extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * @var double
     */
    protected $_discount;
    
    /**
     * @var string
     */
    protected $_default;
    
    /**
     * @var string
     */
    protected $_shopLogin;
    
    /**
     * @var bool
     */
    protected $_shopNetPrice = False;
    
    /**
     * CustomerGroup Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_id":
            
                $this->$name = (int)$value;
                break;
        
            case "_name":
            case "_default":
            case "_shopLogin":
            
                $this->$name = (string)$value;
                break;
        
            case "_discount":
            
                $this->$name = (double)$value;
                break;
        
            case "_shopNetPrice":
            
                $this->$name = (bool)$value;
                break;
        
        }
    }
    
    /**
     * CustomerGroup Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}
?>