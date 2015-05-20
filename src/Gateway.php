<?php

namespace Omnipay\PayPro;

use Omnipay\Common\AbstractGateway;

/**
 * Skeleton Gateway
 */
class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'PayPro';
    }

    public function getDefaultParameters()
    {
        return array(
            'apiKey' => '',
            'productId' => null,
            'testMode' => false,
        );
    }

    public function getApiKey()
    {
        return $this->getParameter('apiKey');
    }

    public function setApiKey($value)
    {
        return $this->setParameter('apiKey', $value);
    }

    /**
     * @param array $parameters
     * @return \Omnipay\PayPro\Message\PurchaseRequest
     */
    public function purchase(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\PayPro\Message\PurchaseRequest', $parameters);
    }

    /**
     * @param array $parameters
     * @return \Omnipay\PayPro\Message\CompletePurchaseRequest
     */
    public function completePurchase(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\PayPro\Message\CompletePurchaseRequest', $parameters);
    }
}
