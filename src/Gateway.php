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

    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\PayPro\Message\PurchaseRequest', $parameters);
    }
}
