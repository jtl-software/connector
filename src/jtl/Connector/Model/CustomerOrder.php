<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Customer order properties.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * 
 * @Serializer\AccessType("public_method")
 */
class CustomerOrder extends DataModel
{
    /**
     * @var string - Status when payment is completed
     */
    const PAYMENT_STATUS_COMPLETED = 'completed';

    /**
     * @var string - Status when order is partially paid
     */
    const PAYMENT_STATUS_PARTIALLY = 'partially_paid';

    /**
     * @var string - Status when order is unpaid
     */
    const PAYMENT_STATUS_UNPAID = 'unpaid';

    /**
     * @var string - Cancelled by merchant or customer
     */
    const STATUS_CANCELLED = 'cancelled';

    /**
     * @var string - Order paid and shipped completely
     */
    const STATUS_COMPLETED = 'completed';

    /**
     * @var string - Initial status for new customerOrder, when customer finished order and order has not yet been paid or fetched
     */
    const STATUS_NEW = 'new';

    /**
     * @var string - Order has been shipped partially
     */
    const STATUS_PARTIALLY_SHIPPED = 'partially_shipped';

    /**
     * @var string - Customer order in process
     */
    const STATUS_PROCESSING = 'processed';

    /**
     * @var string - New status, when changes have been made to customerOrder (e.g. item quantity change)
     */
    const STATUS_UPDATED = 'updated';

    /**
     * @var Identity Reference to billingAddress
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("billingAddressId")
     * @Serializer\Accessor(getter="getBillingAddressId",setter="setBillingAddressId")
     */
    protected $billingAddressId = null;

    /**
     * @var Identity Optional reference to customer. 
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("customerId")
     * @Serializer\Accessor(getter="getCustomerId",setter="setCustomerId")
     */
    protected $customerId = null;

    /**
     * @var Identity Unique customerOrder id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;

    /**
     * @var Identity 
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("paymentModuleId")
     * @Serializer\Accessor(getter="getPaymentModuleId",setter="setPaymentModuleId")
     */
    protected $paymentModuleId = null;

    /**
     * @var Identity Reference to shippingAddress
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("shippingAddressId")
     * @Serializer\Accessor(getter="getShippingAddressId",setter="setShippingAddressId")
     */
    protected $shippingAddressId = null;

    /**
     * @var Identity Identifier code for shippingMethod
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("shippingMethodId")
     * @Serializer\Accessor(getter="getShippingMethodId",setter="setShippingMethodId")
     */
    protected $shippingMethodId = null;

    /**
     * @var CustomerOrderBillingAddress 
     * @Serializer\Type("jtl\Connector\Model\CustomerOrderBillingAddress")
     * @Serializer\SerializedName("billingAddress")
     * @Serializer\Accessor(getter="getBillingAddress",setter="setBillingAddress")
     */
    protected $billingAddress = null;

    /**
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("carrierName")
     * @Serializer\Accessor(getter="getCarrierName",setter="setCarrierName")
     */
    protected $carrierName = '';

    /**
     * @var DateTime Date of creation
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("creationDate")
     * @Serializer\Accessor(getter="getCreationDate",setter="setCreationDate")
     */
    protected $creationDate = null;

    /**
     * @var double 
     * @Serializer\Type("double")
     * @Serializer\SerializedName("credit")
     * @Serializer\Accessor(getter="getCredit",setter="setCredit")
     */
    protected $credit = 0.0;

    /**
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("currencyIso")
     * @Serializer\Accessor(getter="getCurrencyIso",setter="setCurrencyIso")
     */
    protected $currencyIso = '';

    /**
     * @var DateTime 
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("estimatedDeliveryDate")
     * @Serializer\Accessor(getter="getEstimatedDeliveryDate",setter="setEstimatedDeliveryDate")
     */
    protected $estimatedDeliveryDate = null;

    /**
     * @var string Locale set when customerOrder was finished. Important for further E-Mail message and notification localization. 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("languageISO")
     * @Serializer\Accessor(getter="getLanguageISO",setter="setLanguageISO")
     */
    protected $languageISO = '';

    /**
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("note")
     * @Serializer\Accessor(getter="getNote",setter="setNote")
     */
    protected $note = '';

    /**
     * @var string Optional order number (usually set by ERP System later)
     * @Serializer\Type("string")
     * @Serializer\SerializedName("orderNumber")
     * @Serializer\Accessor(getter="getOrderNumber",setter="setOrderNumber")
     */
    protected $orderNumber = '';

    /**
     * @var DateTime Payment date
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("paymentDate")
     * @Serializer\Accessor(getter="getPaymentDate",setter="setPaymentDate")
     */
    protected $paymentDate = null;

    /**
     * @var CustomerOrderPaymentInfo 
     * @Serializer\Type("jtl\Connector\Model\CustomerOrderPaymentInfo")
     * @Serializer\SerializedName("paymentInfo")
     * @Serializer\Accessor(getter="getPaymentInfo",setter="setPaymentInfo")
     */
    protected $paymentInfo = null;

    /**
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("paymentModuleCode")
     * @Serializer\Accessor(getter="getPaymentModuleCode",setter="setPaymentModuleCode")
     */
    protected $paymentModuleCode = '';

    /**
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("paymentStatus")
     * @Serializer\Accessor(getter="getPaymentStatus",setter="setPaymentStatus")
     */
    protected $paymentStatus = '';

    /**
     * @var CustomerOrderShippingAddress 
     * @Serializer\Type("jtl\Connector\Model\CustomerOrderShippingAddress")
     * @Serializer\SerializedName("shippingAddress")
     * @Serializer\Accessor(getter="getShippingAddress",setter="setShippingAddress")
     */
    protected $shippingAddress = null;

    /**
     * @var DateTime Shipping date
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("shippingDate")
     * @Serializer\Accessor(getter="getShippingDate",setter="setShippingDate")
     */
    protected $shippingDate = null;

    /**
     * @var string Additional shipping info
     * @Serializer\Type("string")
     * @Serializer\SerializedName("shippingInfo")
     * @Serializer\Accessor(getter="getShippingInfo",setter="setShippingInfo")
     */
    protected $shippingInfo = '';

    /**
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("shippingMethodName")
     * @Serializer\Accessor(getter="getShippingMethodName",setter="setShippingMethodName")
     */
    protected $shippingMethodName = '';

    /**
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("shippingStatus")
     * @Serializer\Accessor(getter="getShippingStatus",setter="setShippingStatus")
     */
    protected $shippingStatus = '';

    /**
     * @var string Customer order status: new / processing / payment_completed / completed / partially_shipped / cancelled / reactivated / updated / pending_payment
     * @Serializer\Type("string")
     * @Serializer\SerializedName("status")
     * @Serializer\Accessor(getter="getStatus",setter="setStatus")
     */
    protected $status = '';

    /**
     * @var double 
     * @Serializer\Type("double")
     * @Serializer\SerializedName("totalSum")
     * @Serializer\Accessor(getter="getTotalSum",setter="setTotalSum")
     */
    protected $totalSum = 0.0;

    /**
     * @var jtl\Connector\Model\CustomerOrderAttr[] 
     * @Serializer\Type("array<jtl\Connector\Model\CustomerOrderAttr>")
     * @Serializer\SerializedName("attributes")
     * @Serializer\AccessType("reflection")
     */
    protected $attributes = array();

    /**
     * @var jtl\Connector\Model\CustomerOrderItem[] 
     * @Serializer\Type("array<jtl\Connector\Model\CustomerOrderItem>")
     * @Serializer\SerializedName("items")
     * @Serializer\AccessType("reflection")
     */
    protected $items = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new Identity();
        $this->customerId = new Identity();
        $this->shippingMethodId = new Identity();
        $this->paymentModuleId = new Identity();
        $this->shippingAddressId = new Identity();
        $this->billingAddressId = new Identity();
    }

    /**
     * @param Identity $billingAddressId Reference to billingAddress
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setBillingAddressId(Identity $billingAddressId)
    {
        return $this->setProperty('billingAddressId', $billingAddressId, 'Identity');
    }

    /**
     * @return Identity Reference to billingAddress
     */
    public function getBillingAddressId()
    {
        return $this->billingAddressId;
    }

    /**
     * @param Identity $customerId Optional reference to customer. 
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerId(Identity $customerId)
    {
        return $this->setProperty('customerId', $customerId, 'Identity');
    }

    /**
     * @return Identity Optional reference to customer. 
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param Identity $id Unique customerOrder id
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }

    /**
     * @return Identity Unique customerOrder id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param Identity $paymentModuleId 
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setPaymentModuleId(Identity $paymentModuleId)
    {
        return $this->setProperty('paymentModuleId', $paymentModuleId, 'Identity');
    }

    /**
     * @return Identity 
     */
    public function getPaymentModuleId()
    {
        return $this->paymentModuleId;
    }

    /**
     * @param Identity $shippingAddressId Reference to shippingAddress
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setShippingAddressId(Identity $shippingAddressId)
    {
        return $this->setProperty('shippingAddressId', $shippingAddressId, 'Identity');
    }

    /**
     * @return Identity Reference to shippingAddress
     */
    public function getShippingAddressId()
    {
        return $this->shippingAddressId;
    }

    /**
     * @param Identity $shippingMethodId Identifier code for shippingMethod
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setShippingMethodId(Identity $shippingMethodId)
    {
        return $this->setProperty('shippingMethodId', $shippingMethodId, 'Identity');
    }

    /**
     * @return Identity Identifier code for shippingMethod
     */
    public function getShippingMethodId()
    {
        return $this->shippingMethodId;
    }

    /**
     * @param CustomerOrderBillingAddress $billingAddress 
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'CustomerOrderBillingAddress'.
     */
    public function setBillingAddress(CustomerOrderBillingAddress $billingAddress)
    {
        return $this->setProperty('billingAddress', $billingAddress, 'jtl\Connector\Model\CustomerOrderBillingAddress');
    }

    /**
     * @return jtl\Connector\Model\CustomerOrderBillingAddress 
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    /**
     * @param string $carrierName 
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setCarrierName($carrierName)
    {
        return $this->setProperty('carrierName', $carrierName, 'string');
    }

    /**
     * @return string 
     */
    public function getCarrierName()
    {
        return $this->carrierName;
    }

    /**
     * @param DateTime $creationDate Date of creation
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setCreationDate(DateTime $creationDate)
    {
        return $this->setProperty('creationDate', $creationDate, 'DateTime');
    }

    /**
     * @return DateTime Date of creation
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @param double $credit 
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setCredit($credit)
    {
        return $this->setProperty('credit', $credit, 'double');
    }

    /**
     * @return double 
     */
    public function getCredit()
    {
        return $this->credit;
    }

    /**
     * @param string $currencyIso 
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setCurrencyIso($currencyIso)
    {
        return $this->setProperty('currencyIso', $currencyIso, 'string');
    }

    /**
     * @return string 
     */
    public function getCurrencyIso()
    {
        return $this->currencyIso;
    }

    /**
     * @param DateTime $estimatedDeliveryDate 
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setEstimatedDeliveryDate(DateTime $estimatedDeliveryDate)
    {
        return $this->setProperty('estimatedDeliveryDate', $estimatedDeliveryDate, 'DateTime');
    }

    /**
     * @return DateTime 
     */
    public function getEstimatedDeliveryDate()
    {
        return $this->estimatedDeliveryDate;
    }

    /**
     * @param string $languageISO Locale set when customerOrder was finished. Important for further E-Mail message and notification localization. 
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setLanguageISO($languageISO)
    {
        return $this->setProperty('languageISO', $languageISO, 'string');
    }

    /**
     * @return string Locale set when customerOrder was finished. Important for further E-Mail message and notification localization. 
     */
    public function getLanguageISO()
    {
        return $this->languageISO;
    }

    /**
     * @param string $note 
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setNote($note)
    {
        return $this->setProperty('note', $note, 'string');
    }

    /**
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param string $orderNumber Optional order number (usually set by ERP System later)
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setOrderNumber($orderNumber)
    {
        return $this->setProperty('orderNumber', $orderNumber, 'string');
    }

    /**
     * @return string Optional order number (usually set by ERP System later)
     */
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }

    /**
     * @param DateTime $paymentDate Payment date
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setPaymentDate(DateTime $paymentDate)
    {
        return $this->setProperty('paymentDate', $paymentDate, 'DateTime');
    }

    /**
     * @return DateTime Payment date
     */
    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    /**
     * @param CustomerOrderPaymentInfo $paymentInfo 
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'CustomerOrderPaymentInfo'.
     */
    public function setPaymentInfo(CustomerOrderPaymentInfo $paymentInfo)
    {
        return $this->setProperty('paymentInfo', $paymentInfo, 'jtl\Connector\Model\CustomerOrderPaymentInfo');
    }

    /**
     * @return jtl\Connector\Model\CustomerOrderPaymentInfo 
     */
    public function getPaymentInfo()
    {
        return $this->paymentInfo;
    }

    /**
     * @param string $paymentModuleCode 
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setPaymentModuleCode($paymentModuleCode)
    {
        return $this->setProperty('paymentModuleCode', $paymentModuleCode, 'string');
    }

    /**
     * @return string 
     */
    public function getPaymentModuleCode()
    {
        return $this->paymentModuleCode;
    }

    /**
     * @param string $paymentStatus 
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setPaymentStatus($paymentStatus)
    {
        return $this->setProperty('paymentStatus', $paymentStatus, 'string');
    }

    /**
     * @return string 
     */
    public function getPaymentStatus()
    {
        return $this->paymentStatus;
    }

    /**
     * @param CustomerOrderShippingAddress $shippingAddress 
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'CustomerOrderShippingAddress'.
     */
    public function setShippingAddress(CustomerOrderShippingAddress $shippingAddress)
    {
        return $this->setProperty('shippingAddress', $shippingAddress, 'jtl\Connector\Model\CustomerOrderShippingAddress');
    }

    /**
     * @return jtl\Connector\Model\CustomerOrderShippingAddress 
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    /**
     * @param DateTime $shippingDate Shipping date
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setShippingDate(DateTime $shippingDate)
    {
        return $this->setProperty('shippingDate', $shippingDate, 'DateTime');
    }

    /**
     * @return DateTime Shipping date
     */
    public function getShippingDate()
    {
        return $this->shippingDate;
    }

    /**
     * @param string $shippingInfo Additional shipping info
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setShippingInfo($shippingInfo)
    {
        return $this->setProperty('shippingInfo', $shippingInfo, 'string');
    }

    /**
     * @return string Additional shipping info
     */
    public function getShippingInfo()
    {
        return $this->shippingInfo;
    }

    /**
     * @param string $shippingMethodName 
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setShippingMethodName($shippingMethodName)
    {
        return $this->setProperty('shippingMethodName', $shippingMethodName, 'string');
    }

    /**
     * @return string 
     */
    public function getShippingMethodName()
    {
        return $this->shippingMethodName;
    }

    /**
     * @param string $shippingStatus 
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setShippingStatus($shippingStatus)
    {
        return $this->setProperty('shippingStatus', $shippingStatus, 'string');
    }

    /**
     * @return string 
     */
    public function getShippingStatus()
    {
        return $this->shippingStatus;
    }

    /**
     * @param string $status Customer order status: new / processing / payment_completed / completed / partially_shipped / cancelled / reactivated / updated / pending_payment
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setStatus($status)
    {
        return $this->setProperty('status', $status, 'string');
    }

    /**
     * @return string Customer order status: new / processing / payment_completed / completed / partially_shipped / cancelled / reactivated / updated / pending_payment
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param double $totalSum 
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setTotalSum($totalSum)
    {
        return $this->setProperty('totalSum', $totalSum, 'double');
    }

    /**
     * @return double 
     */
    public function getTotalSum()
    {
        return $this->totalSum;
    }

    /**
     * @param \jtl\Connector\Model\CustomerOrderAttr $attribute
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function addAttribute(\jtl\Connector\Model\CustomerOrderAttr $attribute)
    {
        $this->attributes[] = $attribute;
        return $this;
    }
    
    /**
     * @return jtl\Connector\Model\CustomerOrderAttr[]
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function clearAttributes()
    {
        $this->attributes = array();
        return $this;
    }

    /**
     * @param \jtl\Connector\Model\CustomerOrderItem $item
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function addItem(\jtl\Connector\Model\CustomerOrderItem $item)
    {
        $this->items[] = $item;
        return $this;
    }
    
    /**
     * @return jtl\Connector\Model\CustomerOrderItem[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function clearItems()
    {
        $this->items = array();
        return $this;
    }
}
