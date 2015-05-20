<?php

namespace PHPSTORM_META {

    /** @noinspection PhpIllegalArrayKeyTypeInspection */
    /** @noinspection PhpUnusedLocalVariableInspection */
    $STATIC_METHOD_TYPES = [
      \Omnipay\Omnipay::create('') => [
        'PayPro' instanceof \Omnipay\PayPro\Gateway,
      ],
      \Omnipay\Common\GatewayFactory::create('') => [
        'PayPro' instanceof \Omnipay\PayPro\Gateway,
      ],
    ];
}
