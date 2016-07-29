# shipping-service-providers-check

This is a PHP package for finding out, which shipping service provider a tracking ID belongs to. Since it's used for Germany, in production the service providers available here are the main focus. Contributions are welcome!

It's theoretically possible that a tracking ID is valid at multiple providers. Therefore it makes the most sense to use `checkAll()` to get an array of answers and pick the most likely one.

### Supported Providers
* DHL
* GLS
* UPS
* Hermes

## Installation
Available via composer on [Packagist](https://packagist.com):

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
"SP" => [
        'base_url' => "http://example.com/tracking_id=",
        'search_string' => 'This is the string that will be looked for',
        'filter' => 'HTML tag to look for',
     ],
// ...
```
It's a positive lookup, so you will get `true` if `search_string` was found in the HTML tag `filter`. For information on filters, see [Goutte](https://github.com/FriendsOfPHP/Goutte).

## License 
* see [LICENSE](https://github.com/repat/shipping-service-providers-check/blob/master/LICENSE) file

## Changelog
* 0.1.1 adding your own providers
* 0.1 fixed to working release (dhl, hermes, gls, ups)
* 0.0.1 initial release for testing

## Contact
* Homepage: https://repat.de
* e-mail: repat@repat.de
* Twitter: [@repat123](https://twitter.com/repat123 "repat123 on twitter")

[![Flattr this git repo](http://api.flattr.com/button/flattr-badge-large.png)](https://flattr.com/submit/auto?user_id=repat&url=https://github.com/repat/shipping-service-provider-check&title=shipping-service-provider-check&language=&tags=github&category=software) 

