<?php

namespace Omnipay\Paysimple\Message;

class RefundRequest extends AbstractRequest
{
    
    public function getPaymentId()
    {
        return $this->getParameter('PaymentId');
    }

    public function setPaymentId($value)
    {
        return $this->setParameter('PaymentId', $value);
    }

    public function getData()
    {
        return array();
    }

    public function getHttpMethod()
    {
        return 'PUT';
    }

    public function getEndpoint()
    {
        $endpoint = $this->getTestMode() ? $this->sandboxEndpoint : $this->productionEndpoint;
        return  $endpoint . '/v4/payment/' .  $this->getPaymentId() . '/reverse';
    }
}
