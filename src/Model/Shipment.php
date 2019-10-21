<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use DateTime;
use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;

/**
 * Shipment Model with reference to a deliveryNote
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class Shipment extends DataModel
{
    /**
     * @var Identity Reference to deliveryNote
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("deliveryNoteId")
     * @Serializer\Accessor(getter="getDeliveryNoteId",setter="setDeliveryNoteId")
     */
    protected $deliveryNoteId = null;
    
    /**
     * @var Identity Unique shipment id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;
    
    /**
     * @var string Carrier name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("carrierName")
     * @Serializer\Accessor(getter="getCarrierName",setter="setCarrierName")
     */
    protected $carrierName = '';
    
    /**
     * @var DateTime Creation date
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("creationDate")
     * @Serializer\Accessor(getter="getCreationDate",setter="setCreationDate")
     */
    protected $creationDate = null;
    
    /**
     * @var string Optional Identcode
     * @Serializer\Type("string")
     * @Serializer\SerializedName("identCode")
     * @Serializer\Accessor(getter="getIdentCode",setter="setIdentCode")
     */
    protected $identCode = '';
    
    /**
     * @var string Optional shipment note
     * @Serializer\Type("string")
     * @Serializer\SerializedName("note")
     * @Serializer\Accessor(getter="getNote",setter="setNote")
     */
    protected $note = '';
    
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("trackingUrl")
     * @Serializer\Accessor(getter="getTrackingUrl",setter="setTrackingUrl")
     */
    protected $trackingUrl = '';
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new Identity();
        $this->deliveryNoteId = new Identity();
    }
    
    /**
     * @param Identity $deliveryNoteId Reference to deliveryNote
     * @return Shipment
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setDeliveryNoteId(Identity $deliveryNoteId): Shipment
    {
        $this->deliveryNoteId = $deliveryNoteId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to deliveryNote
     */
    public function getDeliveryNoteId(): Identity
    {
        return $this->deliveryNoteId;
    }
    
    /**
     * @param Identity $id Unique shipment id
     * @return Shipment
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): Shipment
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return Identity Unique shipment id
     */
    public function getId(): Identity
    {
        return $this->id;
    }
    
    /**
     * @param string $carrierName Carrier name
     * @return Shipment
     */
    public function setCarrierName(string $carrierName): Shipment
    {
        $this->carrierName = $carrierName;
        
        return $this;
    }
    
    /**
     * @return string Carrier name
     */
    public function getCarrierName(): string
    {
        return $this->carrierName;
    }
    
    /**
     * @param \DateTimeInterface $creationDate Creation date
     * @return Shipment
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setCreationDate(\DateTimeInterface $creationDate = null): Shipment
    {
        $this->creationDate = $creationDate;
        
        return $this;
    }
    
    /**
     * @return DateTime Creation date
     */
    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }
    
    /**
     * @param string $identCode Optional Identcode
     * @return Shipment
     */
    public function setIdentCode(string $identCode): Shipment
    {
        $this->identCode = $identCode;
        
        return $this;
    }
    
    /**
     * @return string Optional Identcode
     */
    public function getIdentCode(): string
    {
        return $this->identCode;
    }
    
    /**
     * @param string $note Optional shipment note
     * @return Shipment
     */
    public function setNote(string $note): Shipment
    {
        $this->note = $note;
        
        return $this;
    }
    
    /**
     * @return string Optional shipment note
     */
    public function getNote(): string
    {
        return $this->note;
    }
    
    /**
     * @param string $trackingUrl
     * @return Shipment
     */
    public function setTrackingUrl(string $trackingUrl): Shipment
    {
        $this->trackingUrl = $trackingUrl;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getTrackingUrl(): string
    {
        return $this->trackingUrl;
    }
}