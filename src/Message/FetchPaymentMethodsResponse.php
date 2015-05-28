<?php

namespace Omnipay\PayPro\Message;

use Omnipay\Common\Message\AbstractResponse as BaseAbastractResponse;
use Omnipay\Common\Message\FetchPaymentMethodsResponseInterface;
use Omnipay\Common\PaymentMethod;

class FetchPaymentMethodsResponse extends BaseAbastractResponse implements FetchPaymentMethodsResponseInterface
{
    /**
     * {@inheritdoc}
     */
    public function isSuccessful()
    {
        return isset($this->data['return']) && is_array($this->data['return']) && isset($this->data['return']['data']);
    }

    /**
     * {@inheritdoc}
     */
    public function getPaymentMethods()
    {
        if ( ! $this->isSuccessful()) {
            return array();
        }

        $methods = array();
        foreach ($this->data['return']['data'] as $id => $method) {
            $methods[] = new PaymentMethod($id, $method['description']);
        }

        return $methods;
    }
}
