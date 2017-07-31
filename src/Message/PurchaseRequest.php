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

	public function setAccountId($value)
	{
		return $this->setParameter('AccountId', $value);
	}

	public function setAmount($value)
	{
		return $this->setParameter('Amount', $value);
	}

	public function getData()
	{
		
		$data = array();
		$data['AccountId'] = $this->getAccountId();
		$data['Amount'] = $this->getAmount();

		return $data;
	}

	public function getEndpoint()
	{
		$endpoint = $this->getTestMode() ? $this->sandboxEndpoint : $this->productionEndpoint;
		return  $endpoint . '/v4/payment';
	}	
}
