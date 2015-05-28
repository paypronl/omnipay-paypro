<?php

namespace Omnipay\PayPro\Message;

/**
 * Complete Purchase Request.
 *
 * @method FetchIssuersResponse send()
 */
class FetchIssuersRequest extends FetchPaymentMethodsRequest
{
    /**
     * @param array $data
     *
     * @return CompletePurchaseResponse
     */
    protected function createResponse($data)
    {
        return $this->response = new FetchIssuersResponse($this, $data);
    }
}
