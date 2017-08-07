<?php 

namespace Omnipay\Paysimple\Message;

use Guzzle\Http\Exception\ClientErrorResponseException;

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{

    protected $sandboxEndpoint = "https://sandbox-api.paysimple.com";
    protected $productionEndpoint = "https://api.paysimple.com";

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

    public function authorizationHeader()
    {
        $timestamp = gmdate("c");
        $username = $this->getUsername();
        $secret = $this->getSecret();

        $hmac = hash_hmac("sha256", $timestamp, $secret, true);
        $hmac = base64_encode($hmac);
        $auth = "PSSERVER AccessId = $username; Timestamp = $timestamp; Signature = $hmac";

        return $auth;
    }

    public function getHeaders()
    {
    	$headers = [];

    	return $headers;
    }

    public function send()
    {
    	$data = $this->getData();
        $authorization = $this->authorizationHeader();
    	$headers = array_merge(
    		$this->getHeaders(),
    		['Authorization' => $authorization, 'Content-Type' => 'application/json']
    	);

    	return $this->sendData($data, $headers);
    }

    public function sendData($data, array $headers = null)
    {
        if(sizeof($data) == 0) {
            $data = null;
        } else {
            $data = json_encode($data);    
        }
        
        $httpRequest = $this->httpClient->createRequest(
    		$this->getHttpMethod(),
    		$this->getEndPoint(),
    		$headers,
            $data
    	);

    	try {
            $httpResponse = $httpRequest->send();    
        } catch (ClientErrorResponseException $e) {
            $httpResponse = $e->getResponse();
        }
        
        return (new Response($this, $httpResponse));
    }

    public function getHttpMethod()
    {
    	return 'POST';
    }

    abstract public function getEndpoint();
}
