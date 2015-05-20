<?php

namespace Omnipay\PayPro\Message;

use Omnipay\Common\CreditCard;
use Omnipay\Tests\TestCase;

class PurchaseRequestTest extends TestCase
{
    /**
     * @var PurchaseRequest
     */
    private $request;

    public function setUp()
    {
        parent::setUp();

        $this->request = new PurchaseRequest($this->getHttpClient(), $this->getHttpRequest());
        $this->request->initialize(
            array(
              'amount' => 1234,
              'description' => 'Payment test',
              'returnUrl' => 'omnipay-paypro.fcs/return.php',
            )
        );
    }

    public function testGetData()
    {
        $data = $this->request->getData();

        $this->assertSame(1234, $data['amount']);

        $this->assertSame('Payment test', $data['description']);
        $this->assertSame('omnipay-paypro.fcs/return.php', $data['returnUrl']);
    }
}
