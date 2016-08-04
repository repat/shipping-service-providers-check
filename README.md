# shipping-service-providers-check

This is a PHP package for finding out, which shipping service provider a tracking ID belongs to. Since it's used for Germany the service providers available here are the main focus. Contributions are welcome!

It's theoretically possible that a tracking ID is valid at multiple providers. That's why you get an array back that could contain multiple `true`s.

Blog Article (German): https://repat.de/2016/07/herausfinden-zu-welchem-versanddienstleister-eine-tracking-id-gehoert/

### Supported Providers
* DHL
* GLS
* UPS
* Hermes
* [Amazon Logistics](https://www.amazon.com/gp/help/customer/display.html?nodeId=201821690) for MUC/Germany(?)

### How it works ###
* Scraping the website, try to enter the tracking ID and see what happens
OR
* Checking the format of the tracking ID with [regular expressions](https://en.wikipedia.org/wiki/Regular_expression)

## Installation
Available via composer on [Packagist](https://packagist.org/packages/repat/shipping-service-provider-check):

`composer require repat/shipping-service-providers-check`

## Usage

Check out `src/ShippingServiceProvidersCheck/default_providers.php` for configuration.

```php
use repat\ShippingServiceProvidersCheck\Check;

$check = new Check($trackingId);

// checks all providers, returns an array like 
// [
//   "dhl" => true,
//   "gls" => false,
//    ...
// ]
$check->checkAll();

// replacing providers or with your own providers, see below
$check->checkAll($extraProviders);

// gets all available providers
$check->getProviders();
```

### Replacing providers and adding your own providers
If you want to add your own provider, you can provide `checkAll()` with an array like this. Any contributions are most welcome.

```php
// online check
"SPO" => [
        'base_url' => "http://example.com/tracking_id=",
        'search_string' => 'This is the string that will be looked for',
        'filter' => 'HTML tag to look for',
     ],
// format check
"SPF" => [
        'regex' => '/[foo]{1}/'
     ],
// ...
```
It's a positive lookup, so you will get `true` if `search_string` was found in the HTML tag `filter`. For information on filters, see [Goutte](https://github.com/FriendsOfPHP/Goutte).

For documentation on regular expressions in PHP see [preg_match](http://php.net/manual/de/function.preg-match.php).

## License 
* see [LICENSE](https://github.com/repat/shipping-service-providers-check/blob/master/LICENSE) file

## Changelog
* 0.2 added regex for tracking ID recognition and amazon logistics as a provider
* 0.1.1 adding your own providers
* 0.1 fixed to working release (dhl, hermes, gls, ups)
* 0.0.1 initial release for testing

## Contact
* Homepage: https://repat.de
* e-mail: repat@repat.de
* Twitter: [@repat123](https://twitter.com/repat123 "repat123 on twitter")

[![Flattr this git repo](http://api.flattr.com/button/flattr-badge-large.png)](https://flattr.com/submit/auto?user_id=repat&url=https://github.com/repat/shipping-service-provider-check&title=shipping-service-provider-check&language=&tags=github&category=software) 

