# shipping-service-providers-check

`UNDER DEVELOPMENT`

This is a PHP package for finding out, which shipping service provider a tracking ID belongs to. Since it's used for Germany, in production the service providers available here are the main focus. Contributions are welcome!

It's theoretically possible that a tracking ID is valid at multiple providers. Therefore it makes the most sense to use `checkAll()` to get an array of answers and pick the most likely one.

## Installation
Available on Packagist:

`composer require repat/shipping-service-providers-check`

## Usage

Check out out `config.php`.

```php
use repat\ShippingServiceProvidersCheck\Check;

$check = new Check($trackingId);

$shippingProviders = require 'config.php';

// checks all providers, returns an array like 
// [ "dhl" => true,
//   "gls" => false,
//    ...
// ]
$check->checkAll($shippingProviders);

// gets all available providers
$check->getProviders();

// tbc
```

## License 
* see [LICENSE](https://github.com/repat/shipping-service-providers-check/blob/master/LICENSE) file
r
## Changelog
* 0.0.1 initial release

## Contact
#### Developer/Company
* Homepage: https://repat.de
* e-mail: repat@repat.de
* Twitter: [@repat123](https://twitter.com/repat123 "repat123 on twitter")

[![Flattr this git repo](http://api.flattr.com/button/flattr-badge-large.png)](https://flattr.com/submit/auto?user_id=repat&url=https://github.com/repat/shipping-service-provider-check&title=shipping-service-provider-check&language=&tags=github&category=software) 

