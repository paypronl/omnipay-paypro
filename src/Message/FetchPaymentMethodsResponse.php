<?php

namespace Omnipay\PayPro\Message;

use Omnipay\Common\Message\AbstractResponse as BaseAbastractResponse;
use Omnipay\Common\Message\FetchPaymentMethodsResponseInterface;
use Omnipay\Common\PaymentMethod;

class FetchPaymentMethodsResponse extends BaseAbastractResponse implements FetchPaymentMethodsResponseInterface
{
    protected $methods = array(
        '000' => 'iDEAL',
        '102' => 'PayPal',
        '104' => 'Bancontact MrCash',
        '105' => 'SEPA Machtiging',
        '106' => 'SEPA Overboeking',
        '108' => 'Afterpay',
    );

    /**
     * {@inheritdoc}
     */
    public function isSuccessful()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function getPaymentMethods()
    {
        $methods = array();

        foreach ($this->methods as $id => $name) {
            $methods[] = new PaymentMethod((string) $id, (string) $name);
        }

        return $methods;
    }
}
