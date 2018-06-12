<?php

namespace Omnipay\Paysimple\Message;

class Response implements \Omnipay\Common\Message\ResponseInterface
{
    public function __construct($request, $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function getRequest()
    {
        $this->request;
    }
    
    public function isSuccessful()
    {
        $failureData = false;
        $message = $this->getMessage();
        if (is_array($message)
            && isset($message['Response']['FailureData'])
            && is_array($message['Response']['FailureData'])) {
            $failureData = true;
        }

        return ($this->response->getStatusCode() >= 200 && $this->response->getStatusCode() <= 299 && !$failureData);
    }
    
    public function isRedirect()
    {
        return false;
    }

    public function isCancelled()
    {
        return false;
    }
    
    public function getMessage()
    {
        $this->response->getBody()->rewind();
        return json_decode($this->response->getBody()->getContents(), true);
    }
    
    public function getCode()
    {
        return $this->response->getStatusCode();
    }

    public function getTransactionReference()
    {
        
        $this->response->getBody()->rewind();
        $json = json_decode($this->response->getBody()->getContents(), true);

        return $json['Response']['Id'];
    }

    public function getData()
    {
        return $this->request->getData();
    }
}
