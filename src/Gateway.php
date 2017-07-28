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

    public function fetchCustomers(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Paysimple\Message\FetchCustomersRequest', $parameters);
    }

    /*
    authorize
    completeAuthorize
    capture
    purchase
    completePurchase
    refund
    void

    createCard
    updateCard
    deleteCard

    createBankAccount
    updateBankAccount
    deleteBankAccount

    createCustomer
    updateCustomer
    deleteCustomer
    */
}
