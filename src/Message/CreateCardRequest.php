<?php

namespace Omnipay\Paysimple\Message;

class CreateCardRequest extends AbstractRequest
{

	public function getCustomerId()
	{
		return $this->getParameter('CustomerId');
	}

	public function getIssuer()
	{
		return $this->getParameter('Issuer');
	}

	public function getIsDefault()
	{
		return $this->getParameter('IsDefault');
	}

	public function getBillingZipCode()
	{
		return $this->getParameter('BillingZipCode');
	}

	public function setCustomerId($value)
	{
		return $this->setParameter('CustomerId', $value);
	}

	public function setIssuer($value)
	{
		return $this->setParameter('Issuer', $value);
	}

	public function setIsDefault($value)
	{
		return $this->setParameter('IsDefault', $value);
	}

	public function setBillingZipCode($value)
	{
		return $this->setParameter('BillingZipCode', $value);
	}


	public function getData()
	{
		$this->getCard()->validate();

		$data = array();
		$data['CustomerId'] = $this->getCustomerId();
		$data['CreditCardNumber'] = $this->getCard()->getNumber();
		$data['ExpirationDate'] = $this->getCard()->getExpiryDate('m/yy');
		$data['Issuer'] = $this->getIssuer();
		$data['IsDefault'] = $this->getIsDefault();
		$data['BillingZipCode'] = $this->getBillingZipCode();

		return $data;
	}

	public function getEndpoint()
	{
		$endpoint = $this->getTestMode() ? $this->sandboxEndpoint : $this->productionEndpoint;
		return  $endpoint . '/v4/account/creditcard';
	}
}