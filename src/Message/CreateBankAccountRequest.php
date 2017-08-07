<?php

namespace Omnipay\Paysimple\Message;

class CreateBankAccountRequest extends AbstractRequest
{

    public function getCustomerId()
    {
        return $this->getParameter('CustomerId');
    }

    public function getRoutingNumber()
    {
        return $this->getParameter('RoutingNumber');
    }

    public function getAccountNumber()
    {
        return $this->getParameter('AccountNumber');
    }

    public function getBankName()
    {
        return $this->getParameter('BankName');
    }

    public function getIsCheckingAccount()
    {
        return $this->getParameter('IsCheckingAccount');
    }

    public function getIsDefault()
    {
        return $this->getParameter('IsDefault');
    }

    public function setCustomerId($value)
    {
        return $this->setParameter('CustomerId', $value);
    }

    public function setRoutingNumber($value)
    {
        return $this->setParameter('RoutingNumber', $value);
    }

    public function setAccountNumber($value)
    {
        return $this->setParameter('AccountNumber', $value);
    }

    public function setBankName($value)
    {
        return $this->setParameter('BankName', $value);
    }

    public function setIsCheckingAccount($value)
    {
        return $this->setParameter('IsCheckingAccount', $value);
    }

    public function setIsDefault($value)
    {
        return $this->setParameter('IsDefault', $value);
    }

    public function getData()
    {
        $data = array();

        $data['CustomerId'] = $this->getCustomerId();
        $data['RoutingNumber'] = $this->getRoutingNumber();
        $data['AccountNumber'] = $this->getAccountNumber();
        $data['BankName'] = $this->getBankName();
        $data['IsCheckingAccount'] = $this->getIsCheckingAccount();
        $data['IsDefault'] = $this->getIsDefault();

        return $data;
    }

    public function getEndpoint()
    {
        $endpoint = $this->getTestMode() ? $this->sandboxEndpoint : $this->productionEndpoint;
        return  $endpoint . '/v4/account/ach';
    }
}
