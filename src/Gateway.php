<?php 

namespace Omnipay\Paysimple;

use Omnipay\Common\AbstractGateway;

class Gateway extends AbstractGateway
{
    /*
    public function initialize(array $parameters = array()) 
    {
        parent::initialize($parameters);
    }
    */

    public function getName()
    {
        return 'Paysimple';
    }

    public function getUsername()
    {
        return $this->getParameter('username');
    }

    public function setUsername($value)
    {
        return $this->setParameter('username', $value);
    }

    public function getSecret()
    {
        return $this->getParameter('secret');
    }

    public function setSecret($value)
    {
        return $this->setParameter('secret', $value);
    }

    public function createCustomer(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Paysimple\Message\CreateCustomerRequest', $parameters);
    }

    public function createBankAccount(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Paysimple\Message\CreateBankAccountRequest', $parameters);
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Paysimple\Message\PurchaseRequest', $parameters);
    }

    public function createCard(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Paysimple\Message\CreateCardRequest', $parameters);
    }

    public function void(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Paysimple\Message\VoidRequest', $parameters);
    }

    public function refund(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Paysimple\Message\RefundRequest', $parameters);
    }
}
