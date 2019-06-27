## MOBIAN Global, Reseller API for PHP :: Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## [0.7.2] - 2019-07-06

**Added**

* `/catalogue` request to retrieve products.


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
