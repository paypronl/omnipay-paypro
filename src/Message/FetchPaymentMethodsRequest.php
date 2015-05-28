<?php

namespace Omnipay\PayPro\Message;

/**
 * @method FetchPaymentMethodsResponse send()
 */
class FetchPaymentMethodsRequest extends AbstractRequest
{
    /**
     * @return array;
     */
    public function getData()
    {
        return array();
    }

    /**
     * @param array $data
     *
     * @return CompletePurchaseResponse
     */
    protected function createResponse($data)
    {
        return $this->response = new FetchPaymentMethodsResponse($this, $data);
    }

    /**
     * @return string
     */
    protected function getCommand()
    {
        return 'get_pay_methods';
    }
}

