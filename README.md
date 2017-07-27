# Absolute URL Redirector

This is a simple package that simplifies the process of performing redirects from one absolute URL to another. 
It's not meant to be, in any way, sophisticated.

## Installing

To install the module, use Composer by running `composer require settermjd/url-redirector`.

## Getting Started

The constructor takes two arguments:

1. An array. This is a simple key/value list of URLs that require redirecting, and where they should be redirected to
2. The currently requested URL. 

The package provides two functions: 

- `requiresRedirect()`: This tests if the requested URL requires a redirect
- `getRedirectUrl()`: This retrieves the URL that the current request should be redirected to

If you just want to test, use the first, if you want to redirect, use the second, which uses the first internally.

After initializing the object, pass the return value from `getRedirectUrl()` to PHP's [header](http://php.net/manual/de/function.header.php) function, as in the example below, and the request will be redirected.

```php
<?php

require_once('vendor/autoload.php');

$redirectList = [];
$requestUrl = '';  // the requested URL

$redirector = new Redirector\Redirector($redirectList, $requestUrl);

if ($redirector->requiresRedirect()) {
    header(sprintf('Location: %s', $redirector->getRedirectUrl()));
    exit;
}
``` 

## Running the Tests

To run the unit tests, run `composer test`.
