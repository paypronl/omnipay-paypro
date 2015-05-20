<?php
namespace Omnipay\PayPro\Message;

/**
 * Purchase Request
 */
class CompletePurchaseResponse extends AbstractResponse
{

    public function __construct(CompletePurchaseRequest $request, array $data)
    {
        $this->request = $request;
        $this->data = $data;

        if ($data['amount'] !== $request->getAmountInteger()) {
            throw new \Exception("Amount doesn't match original amount");
        }

        if ($data['remote_ip'] !== '178.22.56.21') {
            throw new \Exception("Invalid remote IP");
        }

        // TODO; check email?
    }


    public function getTransactionReference()
    {

    }

    /**
     * Does the response require a redirect?
     *
     * @return boolean
     */
    public function isSuccesful()
    {
        return true;
    }

}
