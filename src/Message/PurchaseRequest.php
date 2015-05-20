<?php
namespace Omnipay\PayPro\Message;
/**
 * Purchase Request
 *
 * @method PurchaseResponse send()
 */
class PurchaseRequest extends AbstractRequest
{
    protected $command = 'create_payment';

    protected function createResponse($data)
    {
        return $this->response = new PurchaseResponse($this, $data);
    }
}
