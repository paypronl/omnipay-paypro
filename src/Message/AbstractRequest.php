<?php

namespace Omnipay\Skeleton\Message;

use Omnipay\Common\Message\AbstractRequest as BaseAbstractRequest;

/**
 * Abstract Request
 *
 */
abstract class AbstractRequest extends BaseAbstractRequest
{
    protected $endpoint = 'https://www.paypro.nl/post_api/';
    protected $command;

    public function getApiKey()
    {
        return $this->getParameter('apiKey');
    }

    public function setApiKey($value)
    {
        return $this->setParameter('apiKey', $value);
    }

    public function getData()
    {
        return $this->parameters->all();
    }

    public function sendData($data)
    {
        $url = $this->getEndpoint();

        $body = array(
            'apikey' => $this->getApiKey(),
            'command' => $this->command,
            'params' => json_encode($data),
        );
        $httpResponse = $this->httpClient->post($url, null, $body)->send();

        return $this->createResponse($httpResponse->getBody());
    }

    protected function getEndpoint()
    {
        return $this->endpoint;
    }

    protected function createResponse($data)
    {
        return $this->response = new Response($this, $data);
    }
}
