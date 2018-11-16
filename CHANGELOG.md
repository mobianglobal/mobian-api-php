## MOBIAN Global, Reseller API for PHP :: Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

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
