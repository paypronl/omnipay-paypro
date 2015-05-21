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
              'apiKey' => 'YOUR API KEY',
              'amount' => 12.34,
              'description' => 'Payment test',
              'returnUrl' => 'omnipay-paypro.fcs/return.php',
              'notifyUrl' => 'omnipay-paypro.fcs/notify.php',
              'issuer' => '0123',
              'transactionId' => 'abc12345',
              'vat' => 21,
              'card' => array(
                'email' => 'info@example.com',
                'name' => 'My Name',
                'address1' => 'Street 1',
                'address2' => 'Second line',
                'postcode' => '1234AB',
                'city' => 'Eindhoven',
                'country' => 'The Netherlands',
              ),
            )
        );
    }

    public function testGetData()
    {
        $data = $this->request->getData();

        $this->assertSame('YOUR API KEY', $this->request->getApiKey());

        $this->assertSame(1234, $data['amount']);
        $this->assertSame('Payment test', $data['description']);
        $this->assertSame('omnipay-paypro.fcs/return.php', $data['return_url']);
        $this->assertSame('omnipay-paypro.fcs/notify.php', $data['postback_url']);
        $this->assertSame('0123', $data['psp_code']);
        $this->assertSame('abc12345', $data['custom']);
        $this->assertSame(21, $data['vat']);

        $this->assertSame('info@example.com', $data['consumer_email']);
        $this->assertSame('My Name', $data['consumer_name']);
        $this->assertSame("Street 1\nSecond line", $data['consumer_address']);
        $this->assertSame('1234AB', $data['consumer_postal']);
        $this->assertSame('Eindhoven', $data['consumer_city']);
        $this->assertSame('The Netherlands', $data['consumer_country']);
    }
}
