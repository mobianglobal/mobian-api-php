# MOBIAN Global, Reseller API for PHP

The MOBIAN Reseller API can be used to book various travel services. For the resellers we tend to make the integration as easy as possible by setting up a default package. This should take care of the default requests and validations on the API side.

This package is actively maintained with the API's versions to make switching between versions less of a pain as well.

Necessities for the package;

* PHP 5.6 or higher
* cURL

## Install

The recommended way to install the package is through
[Composer](http://getcomposer.org).

```bash
composer require mobianglobal/reseller-api-php
```

After installing, make sure you require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

You can then later update Guzzle using composer:

 ```bash
composer update mobianglobal/reseller-api-php
 ```

## Example usage

```
use Mobian\ResellerApi\Requests\Bookings\FetchAll as FetchBookingsRequest;

// Setup reseller authentication key
MobianConfig::setAuthKey('RESELLER_KEY_HERE');

$request = new FetchBookingsRequest([
    'order_id' => 0123456789,
]);

$bookings = MobianClient::request($request);
```
