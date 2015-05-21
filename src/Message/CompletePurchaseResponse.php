<?php

namespace Omnipay\PayPro\Message;

/**
 * Purchase Request.
 */
class CompletePurchaseResponse extends AbstractResponse
{
    /**
     * Is the request successful?
     *
     * @return bool
     */
    public function isSuccessful()
    {
        return $this->getType() === 'Verkoop';
    }

    /**
     * Gateway Reference.
     *
     * @return string A reference provided by the gateway to represent this transaction
     */
    public function getTransactionReference()
    {
        return $this->get('payment_hash');
    }

    /**
     * Transaction ID.
     *
     * @return string
     */
    public function getTransactionId()
    {
        return $this->get('custom');
    }

    /**
     * Response code.
     *
     * @return string The type of response
     */
    public function getType()
    {
        return $this->get('type');
    }

    /**
     * Response code.
     *
     * @return string A response code from the payment gateway
     */
    public function getCode()
    {
        return $this->getType();
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->getProductName();
    }

    /**
     * @return int
     */
    public function getProductId()
    {
        return (int) $this->get('product_id');
    }

    /**
     * @return string
     */
    public function getProductName()
    {
        return $this->get('product_name');
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->get('amount') / 100;
    }
}
