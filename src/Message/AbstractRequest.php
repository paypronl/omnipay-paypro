<?php

namespace Omnipay\PayPro\Message;

use Omnipay\Common\Message\AbstractRequest as BaseAbstractRequest;
use Omnipay\Common\Message\ResponseInterface;

/**
 * Abstract Request
 *
 */
abstract class AbstractRequest extends BaseAbstractRequest
{
    protected $endpoint = 'https://www.paypro.nl/post_api/';
    protected $command;

    /**
     * @return null|string
     */
    public function getApiKey()
    {
        return $this->getParameter('apiKey');
    }

    /**
     * @param  string $value
     * @return $this
     */
    public function setApiKey($value)
    {
        return $this->setParameter('apiKey', $value);
    }

    /**
     * @param  array $data
     * @return ResponseInterface
     */
    public function sendData($data)
    {
        $url = $this->getEndpoint();

        $body = array(
            'apikey' => $this->getApiKey(),
            'command' => $this->getCommand(),
            'params' => json_encode($data),
        );
        $httpResponse = $this->httpClient->post($url, null, $body)->send();

        return $this->createResponse($httpResponse->json());
    }

    /**
     * @return string
     */
    protected function getEndpoint()
    {
        return $this->endpoint;
    }

}
