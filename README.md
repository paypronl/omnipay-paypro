# Omnipay: paypro

**PayPro gateway for the Omnipay PHP payment processing library**

[![Latest Version on Packagist](https://img.shields.io/packagist/v/paypronl/omnipay-paypro.svg?style=flat-square)](https://packagist.org/packages/paypronl/omnipay-paypro)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/paypronl/omnipay-paypro/master.svg?style=flat-square)](https://travis-ci.org/paypronl/omnipay-paypro)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/paypronl/omnipay-paypro.svg?style=flat-square)](https://scrutinizer-ci.com/g/paypronl/omnipay-paypro/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/paypronl/omnipay-paypro.svg?style=flat-square)](https://scrutinizer-ci.com/g/paypronl/omnipay-paypro)
[![Total Downloads](https://img.shields.io/packagist/dt/paypronl/omnipay-paypro.svg?style=flat-square)](https://packagist.org/packages/paypronl/omnipay-paypro)

[Omnipay](https://github.com/thephpleague/omnipay) is a framework agnostic, multi-gateway payment
processing library for PHP 5.3+. This package implements paypro support for Omnipay.

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what
PSRs you support to avoid any confusion with users and contributors.

## Install

Via Composer

``` bash
$ composer require paypronl/omnipay-paypro
```

## Usage

The following gateways are provided by this package:

 * PayPro

## Example

```php
/** @var \Omnipay\PayPro\Gateway $gateway */
$gateway = Omnipay\Omnipay::create('PayPro');
$gateway->initialize([
    'apiKey' => 'YOUR API KEY HERE',
    'productId' => null,
    'testMode' => true,
]);

$params = array(
    'amount' => 12.34,
    'description' => 'Payment test',
    'return_url' => 'www.paypro.nl/return_here',
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

If you discover any security related issues, please email info@paypro.nl instead of using the issue tracker.

## Credits

- [Fruitcake Studio](https://github.com/fruitcakestudio)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
