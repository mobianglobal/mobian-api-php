# MOBIAN API Client for PHP

The MOBIAN API Client for PHP can be used to book various mobility services on the MOBIAN platform. We tend to make the integration as easy as possible by setting up this package. It should take care of the default requests and validations for the API connection to be setup.

This package is actively maintained with the API's versions to make switching between versions less of a pain as well.

## Requirements

* PHP 7.1 or higher
* cURL
* MOBIAN API access

## Composer installation

By far the easiest way to install the package is to require it with [Composer](http://getcomposer.org).

```bash
composer require mobianglobal/mobian-api-php
```

## Getting started

Set up the configuration to use your API key.

```php
use Mobian\ApiClient\MobianApiConfig;

MobianApiConfig::setAuthKey('RESELLER_KEY_HERE');
```

Fetching a set of bookings with a reservation status of `completed`.

```php
use Mobian\ApiClient\MobianApiClient;
use Mobian\ApiClient\Requests\Bookings\GetBookingsRequest;

$request = new GetBookingsRequest([
    'reservation_status' => ['completed'],
]);

$bookings = MobianApiClient::request($request);
```

All available calls and filters are explained in our [API documentation](https://mobianv3reseller.docs.apiary.io/).
