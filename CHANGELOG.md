## MOBIAN Global, Reseller API for PHP :: Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## [1.0.3] - 2020-05-25

**Added**

* Payload option for create transaction request.


## [1.0.0] - 2020-04-09

**Added**

* Function argument types where possible.

**Changed**

* Minimum requirement of PHP 7.1.
* Main namespace for the code to reside at.
* Better directory structure to also host tests and examples in the future.
* Composer package reference.


## [0.10.0] - 2020-01-06

**Added**

* Multi-request support to improve performance when more than 1 call is needed.
* `FailedResponse` class which passes along cURL related errors.
* `isSuccessful` and `isErroneous` checks for responses.

**Fixed**

* PHPdoc for `JsonResponse` constructor.


## [0.9.1] - 2019-11-11

**Added**

* `currency` setter and getter for the config so we can start making use of multi currency.


## [0.9.0] - 2019-08-09

**Added**

* `Transactions\Fetch` request to fetch a transaction.

**Fixed**

* JSON response now returns its internal response value.


## [0.8.1] - 2019-07-19

**Changed**

* `Content-Type` header parsing is now done case insensitive.


## [0.8.0] - 2019-07-19

**Added**

* `Bookings\Voucher` request to fetch the voucher of a booking.
* Content-Type response header to the response classes.

**Changed**

* `CurlAdapter` immediately resolves the response to the correct response class.


## [0.7.2] - 2019-07-06

**Added**

* `Catalogue\Product` request to retrieve catalogue products.


## [0.7.1] - 2019-05-13

**Changed**

* Generic code styling changes.

**Fixed**

* Exception locations and namespaces.


## [0.7.0] - 2019-03-29

**Fixed**

* 204 No Content responses are converted to `EmptyResponse` objects.


## [0.6.0] - 2019-03-26

**Added**

* `Bookings\Confirm` request to confirm bookings on invoice.
* `Config\Fetch` request to request the API's configuration.

**Changed**

* Move the `/api` suffix from the hostname towards the request endpoints.


## [0.5.0] - 2019-03-15

**Added**

* `Accept` header for every request to only accept JSON responses.
* `User-Agent` header for every request to identify package usage.
* Categories request.
* Transaction requests.
* Payment requests.
* Quotes request.
* Amend price request.
* Property group request.
* Properties request.
* Points of interest request.

**Changed**

* Error response gets decoded before throwing exceptions.
* Requests now return a `JsonResponse` object when successful.


## [0.4.0] - 2018-02-26

**Added**

* Amend booking request.
* Catalogue requests for taxi and transfer products.

## [0.3.0] - 2018-11-16

**Added**

* Cancel booking request.
* `Api-Key` header to authenticate against the API.

**Changed**

* Default query values are set to an empty array.

**Fixed**

* Update booking request now has the proper setup.

**Removed**

* `X-Auth-Token` will no longer be accepted by upcoming API versions.


## [0.2.0] - 2018-09-13

**Added**

* Add language support for the curl requests and API config.

**Fixed**

* Make sure we keep PHP 5.6 compliancy.
* Make sure numeric values are represented by %d in the format strings.
* Correct the API URL, so that the prefix does not have to be in every request.


## [0.1.0] - 2018-08-25

**Initial version history**
