<?php

namespace Omnipay\PayPro\Message;

use Omnipay\Common\Issuer;
use Omnipay\Common\Message\FetchIssuersResponseInterface;

class FetchIssuersResponse extends AbstractResponse implements FetchIssuersResponseInterface
{
    protected $issuers = array(
        '0021' => "Rabobank",
        '0031' => "ABN",
        '0721' => "ING",
        '0751' => "SNS",
        '0761' => "ASN",
        '0511' => "Triodos",
        '0771' => "RegioBank",
        '0161' => "VanLanschot",
        '102' => "PayPal",
    );

    /**
     * {@inheritdoc}
     */
    public function isSuccessful()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function getIssuers()
    {
        $issuers = array();

        foreach ($this->issuers as $id => $name) {
            $issuers[] = new Issuer((string) $id, (string) $name);
        }

        return $issuers;
    }
}
