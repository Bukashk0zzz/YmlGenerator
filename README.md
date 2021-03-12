# YML (Yandex Market Language) file generator

[![Build Status](https://img.shields.io/scrutinizer/build/g/Bukashk0zzz/YmlGenerator.svg?style=flat-square)](https://travis-ci.org/Bukashk0zzz/YmlGenerator)
[![Code Coverage](https://img.shields.io/codecov/c/github/Bukashk0zzz/YmlGenerator.svg?style=flat-square)](https://codecov.io/github/Bukashk0zzz/YmlGenerator)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/Bukashk0zzz/YmlGenerator.svg?style=flat-square)](https://scrutinizer-ci.com/g/Bukashk0zzz/YmlGenerator/?branch=master)
[![License](https://img.shields.io/packagist/l/Bukashk0zzz/yml-generator.svg?style=flat-square)](https://packagist.org/packages/Bukashk0zzz/yml-generator)
[![Latest Stable Version](https://img.shields.io/packagist/v/Bukashk0zzz/yml-generator.svg?style=flat-square)](https://packagist.org/packages/Bukashk0zzz/yml-generator)
[![Total Downloads](https://img.shields.io/packagist/dt/Bukashk0zzz/yml-generator.svg?style=flat-square)](https://packagist.org/packages/Bukashk0zzz/yml-generator)

About
-----
[YML (Yandex Market Language)](https://yandex.ru/support/webmaster/goods-prices/technical-requirements.xml) generator.
Uses standard XMLWriter for generating YML file. 
Not required any other library you just need PHP 5.5.0 or >= version.

Generator supports this offer types:
- OfferCustom [(vendor.model)](https://yandex.ru/support/webmaster/goods-prices/technical-requirements.xml#vendor-model)
- OfferBook [(book)](https://yandex.ru/support/webmaster/goods-prices/technical-requirements.xml#book)
- OfferAudiobook [(audiobook)](https://yandex.ru/support/webmaster/goods-prices/technical-requirements.xml#audiobook)
- OfferArtistTitle [(artist.title)](https://yandex.ru/support/webmaster/goods-prices/technical-requirements.xml#artist-title)
- OfferTour [(tour)](https://yandex.ru/support/webmaster/goods-prices/technical-requirements.xml#tour)
- OfferEventTicket [(event-ticket)](https://yandex.ru/support/webmaster/goods-prices/technical-requirements.xml#event-ticket)
- OfferSimple [(empty)](https://yandex.ru/support/webmaster/goods-prices/technical-requirements.xml#base)

Installation
------------
Run composer require

```bash
composer require bukashk0zzz/yml-generator
```


Or add this to your `composer.json` file:

```json
"require": {
	"bukashk0zzz/yml-generator": "dev-master",
}
```

Usage examples
-------------

```php
<?php

use Bukashk0zzz\YmlGenerator\Model\Offer\OfferSimple;
use Bukashk0zzz\YmlGenerator\Model\Category;
use Bukashk0zzz\YmlGenerator\Model\Currency;
use Bukashk0zzz\YmlGenerator\Model\Delivery;
use Bukashk0zzz\YmlGenerator\Model\ShopInfo;
use Bukashk0zzz\YmlGenerator\Settings;
use Bukashk0zzz\YmlGenerator\Generator;

$file = tempnam(sys_get_temp_dir(), 'YMLGenerator');
$settings = (new Settings())
    ->setOutputFile($file)
    ->setEncoding('UTF-8')
;

// Creating ShopInfo object (https://yandex.ru/support/webmaster/goods-prices/technical-requirements.xml#shop)
$shopInfo = (new ShopInfo())
    ->setName('BestShop')
    ->setCompany('Best online seller Inc.')
    ->setUrl('http://www.best.seller.com/')
;

// Creating currencies array (https://yandex.ru/support/webmaster/goods-prices/technical-requirements.xml#currencies)
$currencies = [];
$currencies[] = (new Currency())
    ->setId('USD')
    ->setRate(1)
;

// Creating categories array (https://yandex.ru/support/webmaster/goods-prices/technical-requirements.xml#categories)
$categories = [];
$categories[] = (new Category())
    ->setId(1)
    ->setName($this->faker->name)
;

// Creating offers array (https://yandex.ru/support/webmaster/goods-prices/technical-requirements.xml#offers)
$offers = [];
$offers[] = (new OfferSimple())
    ->setId(12346)
    ->setAvailable(true)
    ->setUrl('http://www.best.seller.com/product_page.php?pid=12348')
    ->setPrice($this->faker->numberBetween(1, 9999))
    ->setCurrencyId('USD')
    ->setCategoryId(1)
    ->setDelivery(false)
    ->setName('Best product ever')
;

// Optional creating deliveries array (https://yandex.ru/support/partnermarket/elements/delivery-options.xml)
$deliveries = [];
$deliveries[] = (new Delivery())
    ->setCost(2)
    ->setDays(1)
    ->setOrderBefore(14)
;

(new Generator($settings))->generate(
    $shopInfo,
    $currencies,
    $categories,
    $offers,
    $deliveries
);
```
### Adding custom elements
if you need additional offers elements in your yml file using method addCustomElement('type','value'). For example:
```php
$offers[] = (new OfferSimple())
    ->setId(12346)
    ->setAvailable(true)
    ->setUrl('http://www.best.seller.com/product_page.php?pid=12348')
    ->setPrice($this->faker->numberBetween(1, 9999))
    ->setCurrencyId('USD')
    ->setCategoryId(1)
    ->setDelivery(false)
    ->setName('Best product ever')
    ->addCustomElement('type', 'value')
;
```

Copyright / License
-------------------

See [LICENSE](https://github.com/bukashk0zzz/YmlGenerator/blob/master/LICENSE)
