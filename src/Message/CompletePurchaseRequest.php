<?php
namespace Omnipay\PayPro\Message;
/**
 * Complete Purchase Request
 *
 */
class CompletePurchaseRequest extends AbstractRequest
{
    protected $allowedIps = array(
        '178.22.56.21', // PayPro gateway
    );

    /**
     * @return array;
     */
    public function getData()
    {
        $data = $this->httpRequest->request->all();
        $data['amount'] = isset($data['amount']) ? (int) $data['amount'] : null;
        return $data;
    }

    /**
     * @param  array $data
     * @return \Omnipay\PayPro\Message\CompletePurchaseResponse
     * @throws \Exception
     */
    public function sendData($data)
    {
        // Check if the request is from a trusted server
        if ( ! in_array($this->httpRequest->getClientIp(), $this->allowedIps)) {
            throw new \Exception("Invalid remote IP");
        }

        // Verify that the amount isn't changed
        if ($data['amount'] !== $this->getAmountInteger()) {
            throw new \Exception("Amount doesn't match original amount");
        }

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
