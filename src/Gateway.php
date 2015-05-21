<?php

namespace Omnipay\PayPro;

use Omnipay\Common\AbstractGateway;

/**
 * Skeleton Gateway
 */
class Gateway extends AbstractGateway
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'PayPro';
    }

    /**
     * @return array
     */
    public function getDefaultParameters()
    {
        return array(
            'apiKey' => '',
            'productId' => null,
            'testMode' => false,
        );
    }

    /**
     * @return string
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
     * @return string
     */
    public function getProductId()
    {
        return $this->getParameter('productId');
    }

    /**
     * @param  int $value
     * @return $this
     */
    public function setProductId($value){
        return $this->setParameter('productId', $value);
    }

    /**
     * @param array $parameters
     * @return \Omnipay\PayPro\Message\PurchaseRequest
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\PayPro\Message\PurchaseRequest', $parameters);
    }

    /**
     * @param array $parameters
     * @return \Omnipay\PayPro\Message\CompletePurchaseRequest
     */
    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\PayPro\Message\CompletePurchaseRequest', $parameters);
    }

    /**
     * @param array $parameters
     * @return \Omnipay\PayPro\Message\FetchIssuersRequest
     */
    public function fetchIssuers(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\PayPro\Message\FetchIssuersRequest', $parameters);
    }

    /**
     * @param array $parameters
     * @return \Omnipay\PayPro\Message\FetchPaymentMethodsRequest
     */
    public function fetchPaymentMethods(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\PayPro\Message\FetchPaymentMethodsRequest', $parameters);
    }
}
