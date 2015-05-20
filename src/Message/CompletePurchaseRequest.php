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
        return [];
    }

    public function send()
    {
        $data = $this->httpRequest->request->all();
        $data['remote_ip'] = $this->httpRequest->getClientIp();

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
