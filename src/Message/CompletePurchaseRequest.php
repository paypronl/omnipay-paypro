<?php
namespace Omnipay\PayPro\Message;
/**
 * Complete Purchase Request
 *
 */
class CompletePurchaseRequest extends AbstractRequest
{
    /**
     * @return array;
     */
    public function getData()
    {
        $data = $this->httpRequest->request->all();
        $data['remote_ip'] = $this->httpRequest->getClientIp();
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
        return $this->response = new CompletePurchaseResponse($this, $data);
    }
}
