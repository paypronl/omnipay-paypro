<?php
namespace Omnipay\PayPro\Message;
/**
 * Complete Purchase Request
 *
 */
class FetchIssuersRequest extends AbstractRequest
{
    /**
     * @return array;
     */
    public function getData()
    {
        return array();
    }

    /**
     * @param  array $data
     * @return CompletePurchaseResponse
     */
    public function sendData($data)
    {
        return $this->createResponse($data);
    }

    /**
     * @param  array $data
     * @return CompletePurchaseResponse
     */
    protected function createResponse($data)
    {
        return $this->response = new FetchIssuersResponse($this, $data);
    }
}
