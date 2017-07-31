<?php 

namespace Omnipay\Paysimple\Message;

class CreateCustomerRequest extends AbstractRequest
{

	public function setFirstName($value)
	{
		return $this->setParameter('FirstName', $value);
	}

	public function setLastName($value)
	{
		return $this->setParameter('LastName', $value);
	}

	public function setShippingSameAsBilling($value)
	{
		return $this->setParameter('ShippingSameAsBilling', $value);
	}

	public function setCompany($value)
	{
		return $this->setParameter('Company', $value);
	}

	public function setCustomerAccount($value)
	{
		return $this->setParameter('CustomerAccount', $value);
	}

	public function setPhone($value)
	{
		return $this->setParameter('Phone', $value);
	}

	public function setAltPhone($value)
	{
		return $this->setParameter('AltPhone', $value);
	}

	public function setMobilePhone($value)
	{
		return $this->setParameter('MobilePhone', $value);
	}

	public function setFax($value)
	{
		return $this->setParameter('Fax', $value);
	}

	public function setEmail($value)
	{
		return $this->setParameter('Email', $value);
	}

	public function setAltEmail($value)
	{
		return $this->setParameter('AltEmail', $value);
	}

	public function setWebsite($value)
	{
		return $this->setParameter('Website', $value);
	}

	public function setNotes($value)
	{
		return $this->setParameter('Notes', $value);
	}

	public function setStreetAddress1($value)
	{
		return $this->setParameter('StreetAddress1', $value);
	}

	public function setStreetAddress2($value)
	{
		return $this->setParameter('StreetAddress2', $value);
	}

	public function setCity($value)
	{
		return $this->setParameter('City', $value);
	}

	public function setStateCode($value)
	{
		return $this->setParameter('StateCode', $value);
	}

	public function setZipCode($value)
	{
		return $this->setParameter('ZipCode', $value);
	}

	public function setCountry($value)
	{
		return $this->setParameter('Country', $value);
	}

	public function getFirstName() 
	{
		return $this->getParameter('FirstName');
	}

	public function getLastName()
	{
		return $this->getParameter('LastName');
	}

	public function getShippingSameAsBilling()
	{
		return $this->getParameter('ShippingSameAsBilling');
	}

	public function getCompany()
	{
		return $this->getParameter('Company');
	}
	
	public function getCustomerAccount()
	{
		return $this->getParameter('CustomerAccount');
	}
	
	public function getPhone()
	{
		return $this->getParameter('Phone');
	}
	
	public function getAltPhone()
	{
		return $this->getParameter('AltPhone');
	}
	
	public function getMobilePhone()
	{
		return $this->getParameter('MobilePhone');
	}
	
	public function getFax()
	{
		return $this->getParameter('Fax');
	}
	
	public function getEmail()
	{
		return $this->getParameter('Email');
	}
	
	public function getAltEmail()
	{
		return $this->getParameter('AltEmail');
	}
	
	public function getWebsite()
	{
		return $this->getParameter('Website');
	}
	
	public function getNotes()
	{
		return $this->getParameter('Notes');
	}

	public function getStreetAddress1()
	{
		return $this->getParameter('StreetAddress1');
	}

	public function getStreetAddress2()
	{
		return $this->getParameter('StreetAddress2');
	}

	public function getStateCode()
	{
		return $this->getParameter('StateCode');
	}

	public function getZipCode()
	{
		return $this->getParameter('ZipCode');
	}

	public function getCountry()
	{
		return $this->getParameter('Country');
	}

	public function getCity()
	{
		return $this->getParameter('City');
	}

	public function getData()
	{
		$data = array();

		$data['FirstName'] = $this->getFirstName();
		$data['LastName'] = $this->getLastName();
		$data['ShippingSameAsBilling'] = $this->getShippingSameAsBilling();
		
		$billingAddress = array();

		$billingAddress['StreetAddress1'] = $this->getStreetAddress1();
		$billingAddress['StreetAddress2'] = $this->getStreetAddress2();
		$billingAddress['City'] = $this->getCity();
		$billingAddress['StateCode'] = $this->getStateCode();
		$billingAddress['ZipCode'] = $this->getZipCode();
		$billingAddress['Country'] = $this->getCountry();

		$billingAddressData = array_filter($billingAddress, function($value) {
			return !empty($value);
		});

		if(sizeof($billingAddressData) > 0) {
			$data['BillingAddress'] = $billingAddress;
		}

		$shippingAddress = array();

		$shippingAddress['StreetAddress1'] = $this->getStreetAddress1();
		$shippingAddress['StreetAddress2'] = $this->getStreetAddress2();
		$shippingAddress['StateCode'] = $this->getStateCode();
		$shippingAddress['ZipCode'] = $this->getZipCode();
		$shippingAddress['Country'] = $this->getCountry();

		$shippingAddressData = array_filter($shippingAddress, function($value) {
			return !empty($value);
		});

		if(sizeof($billingAddressData) > 0) {
			$data['ShippingAddress'] = $billingAddressData;
		}

		$data['Company'] = $this->getCompany();
		$data['CustomerAccount'] = $this->getCustomerAccount();
		$data['Phone'] = $this->getPhone();
		$data['AltPhone'] = $this->getAltPhone();
		$data['MobilePhone'] = $this->getMobilePhone();
		$data['Fax'] = $this->getFax();
		$data['Email'] = $this->getEmail();
		$data['AltEmail'] = $this->getAltEmail();
		$data['Website'] = $this->getWebsite();
		$data['Notes'] = $this->getNotes();

		return $data;
	}

	public function getEndpoint()
	{
		$endpoint = $this->getTestMode() ? $this->sandboxEndpoint : $this->productionEndpoint;
		return  $endpoint . '/v4/customer';
	}
}