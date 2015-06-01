# Omnipay: paypro

**PayPro gateway for the Omnipay PHP payment processing library**

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/paypronl/omnipay-paypro/master.svg?style=flat-square)](https://travis-ci.org/paypronl/omnipay-paypro)

[Omnipay](https://github.com/thephpleague/omnipay) is a framework agnostic, multi-gateway payment
processing library for PHP 5.3+. This package implements paypro support for Omnipay.

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what
PSRs you support to avoid any confusion with users and contributors.

## Install

This gateway can be installed with [Composer](https://getcomposer.org/):

``` bash
$ composer require paypronl/omnipay-paypro:0.1.x@dev
```

## Usage

The following gateways are provided by this package:

 * PayPro

## Example

```php

require_once  __DIR__ . '/vendor/autoload.php';

use Omnipay\Omnipay;

/** @var \Omnipay\PayPro\Gateway $gateway */
$gateway = Omnipay::create('PayPro');

$gateway->initialize([
    'apiKey' => 'YOUR API KEY HERE',
    'productId' => null,
    'testMode' => true,
]);

$params = array(
    'amount' => 12.34,
    'description' => 'Payment test',
    'returnUrl' => 'www.your-domain.nl/return_here',
    'notifyUrl' => 'www.your-domain.nl/notify_here', //see http://www.paypro.nl/postback
    'transactionId' => 'abc12345',
    'issuer' => 'ideal/RABONL2U',
    'productId' => 12345,
    'card' => array(
        'email' => 'info@example.com',
        'name' => 'My name',
    ),
);

$response = $gateway->purchase($params)->send();

if ($response->isSuccessful()) {
    echo 'Success!';
} elseif ($response->isRedirect()) {
    $response->redirect();
} else {
    echo 'Failed';
}
```

For general usage instructions, please see the main [Omnipay](https://github.com/thephpleague/omnipay) repository.

## Parameters

You can set the following parameters:

 - apiKey (required): The PayPro.nl Api Key
 - amount (required): The amount, as float/decimal
 - productId: Your PayPro.nl product Id
 - description: The order description
 - transactionId: A custom transactionId
 - issuer: A payment method, see http://www.paypro.nl/api for all pay methods (select get_all_pay_methods)
 - vat: The VAT percentage
 - returnUrl: The URL to show after payment has been completed.
 - notifyUrl: The URL to post the status to (postback url)
 - testMode: Boolean to indicate testing.

## Card information

 You can set the following information, using the Card object.

 - name / firstName + lastName
 - email
 - address1 / billingAddress1
 - address2 / billingAddress2
 - postcode / billingPostcode
 - city / billingCity
 - country / billingCountry

See http://omnipay.thephpleague.com/api/cards/ for more information.

## Payment methods

You can get all available payment methods with `fetchPaymentMethods()` and the available issuers for all methods with `fetchIssuers()`.
The Issuer ID can be passed to the `purchase()` method to directly configure the payment method.

```php
$methods = $gateway->fetchPaymentMethods()->send()->getPaymentMethods();

/** @var \Omnipay\Common\PaymentMethod $method */
foreach ($methods as $method) {
    echo $method->getId();
    echo $method->getName();
}

$issuers = $gateway->fetchIssuers()->send()->getIssuers();

/** @var \Omnipay\Common\Issuer $issuer */
foreach ($issuers as $issuer) {
    echo $issuer->getId();
    echo $issuer->getName();
    echo $issuer->getPaymentMethod();
}

```

## Support

If you are having general issues with Omnipay, we suggest posting on
[Stack Overflow](http://stackoverflow.com/). Be sure to add the
[omnipay tag](http://stackoverflow.com/questions/tagged/omnipay) so it can be easily found.

If you want to keep up to date with release anouncements, discuss ideas for the project,
or ask more detailed questions, there is also a [mailing list](https://groups.google.com/forum/#!forum/omnipay) which
you can subscribe to.

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/paypronl/omnipay-paypro/issues),
or better yet, fork the library and submit a pull request.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email support@paypro.nl instead of using the issue tracker.

## Credits

- [Fruitcake Studio](https://github.com/fruitcakestudio)
- [PayPro.nl](https://github.com/paypronl)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
