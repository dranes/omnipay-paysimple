<?php

namespace Omnipay\Paysimple\Message;

class RetrieveBankAccountsRequest extends AbstractRequest
{
    public function getCustomerId()
    {
        return $this->getParameter('CustomerId');
    }

    public function setCustomerId($value)
    {
        return $this->setParameter('CustomerId', $value);
    }

    public function getData()
    {
        return array();
    }

    public function getHttpMethod()
    {
        return 'GET';
    }

    public function getEndpoint()
    {
        $endpoint = $this->getTestMode() ? $this->sandboxEndpoint : $this->productionEndpoint;
        return  $endpoint . '/v4/customer/' .  $this->getCustomerId() . '/achaccounts';
    }
}
