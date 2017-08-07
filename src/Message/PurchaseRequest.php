<?php

namespace Omnipay\Paysimple\Message;

class PurchaseRequest extends AbstractRequest
{
    
    public function getAccountId()
    {
        return $this->getParameter('AccountId');
    }

    public function getAmount()
    {
        return $this->getParameter('Amount');
    }

    public function getCVV()
    {
        return $this->getParameter('CVV');
    }

    public function getPaymentSubType()
    {
        return $this->getParameter('PaymentSubType');
    }

    public function getInvoiceId()
    {
        return $this->getParameter('InvoiceId');
    }

    public function getInvoiceNumber()
    {
        return $this->getParameter('InvoiceNumber');
    }

    public function getPurchaseOrderNumber()
    {
        return $this->getParameter('PurechaseOrderNumber');
    }

    public function getOrderId()
    {
        return $this->getParameter('OrderId');
    }

    public function getDescription()
    {
        return $this->getParameter('Description');
    }

    public function getLatitude()
    {
        return $this->getParameter('Latitude');
    }

    public function getLongitude()
    {
        return $this->getParameter('Longitude');
    }

    public function getSuccessReceiptOptions()
    {
        return $this->getParameter('SucceessReceiptOptions');
    }

    public function getFailureReceiptOptions()
    {
        return $this->getParameter('FailuereReceiptOptions');
    }

    public function getSendToCustomer()
    {
        return $this->getParameter('SendToCustomer');
    }

    public function getSendToOtherAddresses()
    {
        return $this->getParameter('SendeToOtherAddresses');
    }

    public function setAccountId($value)
    {
        return $this->setParameter('AccountId', $value);
    }

    public function setAmount($value)
    {
        return $this->setParameter('Amount', $value);
    }

    public function setCVV($value)
    {
        return $this->setParameter('CVV', $value);
    }

    public function setPaymentSubType($value)
    {
        return $this->setParameter('PaymentSubType', $value);
    }

    public function setInvoiceId($value)
    {
        return $this->setParameter('InvoiceId', $value);
    }

    public function setInvoiceNumber($value)
    {
        return $this->setParameter('InvoiceNumber', $value);
    }

    public function setPurchaseOrderNumber($value)
    {
        return $this->setParameter('PurchaseOrderNumber', $value);
    }

    public function setOrderId($value)
    {
        return $this->setParameter('OrderId', $value);
    }

    public function setDescription($value)
    {
        return $this->setParameter('Description', $value);
    }

    public function setLatitude($value)
    {
        return $this->setParameter('Latitude', $value);
    }

    public function setLongitude($value)
    {
        return $this->setParameter('Longitude', $value);
    }

    public function setSuccessReceiptOptions($value)
    {
        return $this->setParameter('SuccessReceiptOptions', $value);
    }

    public function setSendToCustomer($value)
    {
        return $this->setParameter('SendToCustomer', $value);
    }

    public function setFailureReceiptOptions($value)
    {
        return $this->setParameter('FailureReceiptOptions', $value);
    }

    public function setSendToOtherAddresses($value)
    {
        return $this->setParameter('SendToOtherAddresses', $value);
    }

    public function getData()
    {
        
        $data = array();

        $data['AccountId'] = $this->getAccountId();
        $data['Amount'] = $this->getAmount();
        $data['CVV'] = $this->getCVV();
        $data['PaymentSubType'] = $this->getPaymentSubType();
        $data['InvoiceId'] = $this->getInvoiceId();
        $data['InvoiceNumber'] = $this->getInvoiceNumber();
        $data['PurchaseOrderNumber'] = $this->getPurchaseOrderNumber();
        $data['OrderId'] = $this->getOrderId();
        $data['Description'] = $this->getDescription();
        $data['Latitude'] = $this->getLatitude();
        $data['Longitude'] = $this->getLongitude();
        $data['SuccessReceiptOptions'] = $this->getSuccessReceiptOptions();
        $data['SendToCustomer'] = $this->getSendToCustomer();
        $data['SendToOtherAddresses'] = $this->getSendToOtherAddresses();
        $data['FailureReceiptOptions'] = $this->getFailureReceiptOptions();
        $data['SendToCustomer'] = $this->getSendToCustomer();
        $data['SendToOtherAddresses'] = $this->getSendToOtherAddresses();

        return $data;
    }

    public function getEndpoint()
    {
        $endpoint = $this->getTestMode() ? $this->sandboxEndpoint : $this->productionEndpoint;
        return  $endpoint . '/v4/payment';
    }
}
