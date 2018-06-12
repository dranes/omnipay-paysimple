<?php

/**
 * PaySimple Gateway
 */
namespace Omnipay\Paysimple;

use Omnipay\Common\AbstractGateway;

/**
 * PaySimple Gateway.
 *
 * Example:
 *
 * <code>
 *   // Create a gateway for the PaySimple Gateway
 *   $gateway = Omnipay::create('Paysimple');
 *   $gateway->setUsername('Your Username');
 *   $gateway->setSecret('You Secret');
 *   $this->gateway->setTestMode('true');
 *
 *   // Create a Customer
 *   $customer = $gateway->createCustomer([
 *          'FirstName' => 'Andres',
 *          'LastName' => 'Garcia',
 *          'ShippingSameAsBilling' => "true",
 *   ]);
 *
 *   // Create a credit card object
 *   // This card can be used for testing.
 *
 *   $card = new CreditCard(array(
 *      'number' => '5454545454545454',
 *      'expiryMonth' => '13',
 *      'expiryYear' => '2021'
 *   ));
 *
 *   $creditcard = $this->gateway->createCard([
 *      'card' => $card,
 *      'CustomerId' => $customer->getTransactionReference(),
 *      'Issuer' => 13,
 *      'IsDefault' => false
 *   ])->send();
 *
 *   // as alternative method to creditcards you could also create a bank account.
 *   // This bank account can be used for testing.
 *
 *   $bankaccount = $this->gateway->createBankAccount([
 *      'CustomerId' => $customer->getTransactionReference(),
 *      'RoutingNumber' => '131111114',
 *      'AccountNumber' => '751111111',
 *      'BankName' => 'PaySimple Bank',
 *      'IsCheckingAccount' => true,
 *      'IsDefault' => false
 *   ])->send();
 *
 *   // Do a purchase transaction on the gateway
 *   $transaction = $gateway->purchase(array(
 *      'AccountId' => $creditcard->getTransactionReference(),
 *      'Amount' => '50.70'
 *   ))->send();
 *
 *   if($transactions->isSuccessful()) {
 *       echo "Purchase transaction was successful!\n";
 *       $sale_id = $transaction->getTransactionReference();
 *       echo "Transaction reference = " . $sale_id . "\n";
 *   } else {
 *      $response = $transaction->getMessage();
 *   }
 *
 *   // Retrieving bank accounts
 *   $response = $gateway->retrieveBankAccounts(['CustomerId' => '1234567'])->send();
 *   $accounts = $response->getMessage();
 *
 *   // Retrieving credit card
 *   $response = $gateway->retrieveCreditCards(['CustomerId' => '1234567'])->send();
 *   $accounts = $response->getMessage();
 *
 *   // Delete a credit card
 *   $response = $gateway->deleteCreditCard(['AccountId' => '635402'])->send();
 *
 *   // Delete a bank account
 *   $response = $gateway->deleteBankAccount(['AccountId' => '635402'])->send();
 * </code>
 *
 * @link https://developer.paysimple.com
 */

class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'Paysimple';
    }

    /**
     * Get default parameters for this gateway
     *
     * @return void
     */
    public function getDefaultParameters()
    {
        return [
            'username' => '',
            'secret' => '',
            'testMode' => false
        ];
    }

    /**
     * Get the gateway username key
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->getParameter('username');
    }

    /**
     * Set the gateway username key
     *
     * @param  string $value
     * @return Gateway provides a fluent interface.
     */
    public function setUsername($value)
    {
        return $this->setParameter('username', $value);
    }

    /**
     * Get the gateway secret key
     *
     * @return string
     */
    public function getSecret()
    {
        return $this->getParameter('secret');
    }

    /**
     * Set the gateway secret key
     *
     * @param  string $value
     * @return Gateway provides a fluent interface.
     */
    public function setSecret($value)
    {
        return $this->setParameter('secret', $value);
    }

    /**
     * Create Customer Request
     *
     * For PaySimple gateway you always need to create a customer first
     * and use the transaction reference in the response later on any CreditCard or BankAccount
     * request.
     *
     * @param  array|array $parameters
     * @return \Omnipay\Paysimple\Message\Response
     */
    public function createCustomer(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Paysimple\Message\CreateCustomerRequest', $parameters);
    }

    /**
     * Create Bank Account Request
     *
     * You can use ACH as an alternative payment method it's important
     * to save the transaction reference to use it later on purchase request
     *
     * @param  array|array $parameters
     * @return \Omnipay\Paysimple\Message\Response
     */
    public function createBankAccount(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Paysimple\Message\CreateBankAccountRequest', $parameters);
    }

    /**
     * Retrieve Bank Accounts Request
     *
     * Retrieve all bank accounts from a customer
     *
     * @param  array|array $parameters
     * @return \Omnipay\Paysimple\Message\Response
     */
    public function retrieveBankAccounts(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Paysimple\Message\RetrieveBankAccountsRequest', $parameters);
    }

    /**
     * Retrieve Credit Cards Request
     *
     * Retrieve all credit card accounts from a customer
     *
     * @param  array|array $parameters
     * @return \Omnipay\Paysimple\Message\Response
     */
    public function retrieveCreditCards(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Paysimple\Message\RetrieveCreditCardsRequest', $parameters);
    }

    /**
     * Delete Bank Account Request
     *
     * Delete a bank account using AccountId
     *
     * @param  array|array $parameters
     * @return \Omnipay\Paysimple\Message\Response
     */
    public function deleteBankAccount(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Paysimple\Message\DeleteBankAccountRequest', $parameters);
    }

    /**
     * Delete Credit Card Request
     *
     * Delete a credit card using AccountId
     *
     * @param  array|array $parameters
     * @return \Omnipay\Paysimple\Message\Response
     */
    public function deleteCreditCard(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Paysimple\Message\DeleteCreditCardRequest', $parameters);
    }

    /**
     * Purchase Request
     *
     * After create a Bank Account or a Credit Card you can charge a client
     * with this method, you need to pass the transaction reference returned by either
     * the Bank Account method or the Credit Card method.
     *
     * @param  array|array $parameters
     * @return \Omnipay\Paysimple\Message\Response
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Paysimple\Message\PurchaseRequest', $parameters);
    }

    /**
     * Create Credit Card Request
     *
     * Create a Credit Card and associate with a customer it's important
     * to save the transaction reference to ue it later on purchase request.
     *
     * @param  array|array $parameters
     * @return \Omnipay\Paysimple\Message\Response
     */
    public function createCard(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Paysimple\Message\CreateCardRequest', $parameters);
    }

    /**
     * Void Request
     *
     * Any succesfully authorized payment that has not yet been submitted
     * as part of and end-of-day batch can be voided.
     *
     * @param  array|array $parameters
     * @return \Omnipay\Paysimple\Message\Response
     */
    public function void(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Paysimple\Message\VoidRequest', $parameters);
    }

    /**
     * Refund Request
     *
     * Any Settled payment can be refunded.
     *
     * @param  array|array $parameters
     * @return \Omnipay\Paysimple\Message\Response
     */
    public function refund(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Paysimple\Message\RefundRequest', $parameters);
    }

    /**
     * Retrieve Payment
     *
     * Single Payment Objects
     *
     * @param  array|array $parameters
     * @return \Omnipay\Paysimple\Message\Response
     */
    public function retrievePayment(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Paysimple\Message\RetrievePayment', $parameters);
    }
}
