# Paylix PHP SDK 

![tag](https://img.shields.io/github/v/tag/paylix/php-sdk?sort=date&color=blueviolet)
![version](https://img.shields.io/packagist/v/paylix/php-sdk)
![downloads](https://img.shields.io/packagist/dt/paylix/php-sdk)

## Introduction

Paylix public API for developers to access merchant resources

## Requirements

- php ^5.3
- php-curl

## Installation

Install the package through composer.

```
composer require paylixhq/php-sdk
```

## Usage

```php
<?php

require_once 'vendor/autoload.php';

use \Paylix\PhpSdk\Paylix;
use \Paylix\PhpSdk\PaylixException;

// pass <MERCHANT_NAME> only if you need to be authenticated as an additional store

$client = new Paylix("<YOUR_API_KEY>", "<MERCHANT_NAME>");

try {
    $products = $client->get_products();
} catch (PaylixException $e) {
    echo $e->__toString();
}

?>
```

## Documentation

[Paylix Developers API](https://developers.paylix.gg)
