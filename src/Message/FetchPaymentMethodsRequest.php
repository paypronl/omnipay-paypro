<?php

namespace Omnipay\PayPro\Message;

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
    public function sendData($data)
    {
        return $this->createResponse($data);
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
}
