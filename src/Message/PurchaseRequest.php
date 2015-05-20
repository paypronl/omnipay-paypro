<?php
namespace Omnipay\PayPro\Message;
/**
 * Purchase Request
 *
 * @method PurchaseResponse send()
 */
class PurchaseRequest extends AbstractRequest
{
    /**
     * @return array
     */
    public function getData()
    {
        $this->validate('apiKey', 'amount');

        $data = array();
        $data['amount'] = $this->getAmountInteger();
        $data['description'] = $this->getDescription();
        $data['product_id'] = $this->getProductId();
        $data['custom'] = $this->getTransactionId();
        $data['psp_code'] = $this->getIssuer();
        $data['vat'] = $this->getVat();
        $data['return_url'] = $this->getReturnUrl();
        $data['postback_url'] = $this->getNotifyUrl();
        $data['test_mode'] = $this->getTestMode();

        return $data;
    }

    /**
     * @param  array $data
     * @return PurchaseResponse
     */
    protected function createResponse($data)
    {
        return $this->response = new PurchaseResponse($this, $data);
    }

    /**
     * @return string
     */
    protected function getCommand()
    {
        return $this->getProductId() ? 'create_product_payment' : 'create_payment';
    }
}
