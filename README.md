#YML (Yandex Market Language) file generator

[![Build Status](https://img.shields.io/scrutinizer/build/g/blainerohmer/YmlGenerator.svg?style=flat-square)](https://travis-ci.org/blainerohmer/YmlGenerator)
[![Code Coverage](https://img.shields.io/codecov/c/github/blainerohmer/YmlGenerator.svg?style=flat-square)](https://codecov.io/github/blainerohmer/YmlGenerator)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/blainerohmer/YmlGenerator.svg?style=flat-square)](https://scrutinizer-ci.com/g/blainerohmer/YmlGenerator/?branch=master)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/a7b93e1f-5f09-436a-bb45-0eb37b3e6110.svg)](https://insight.sensiolabs.com/projects/a7b93e1f-5f09-436a-bb45-0eb37b3e6110)
[![Dependency Status](https://www.versioneye.com/user/projects/5804e504c3e528003dbfac37/badge.svg?style=flat)](https://www.versioneye.com/user/projects/5804e504c3e528003dbfac37)
[![License](https://img.shields.io/packagist/l/blainerohmer/yml-generator.svg?style=flat-square)](https://packagist.org/packages/blainerohmer/yml-generator)
[![Latest Stable Version](https://img.shields.io/packagist/v/blainerohmer/yml-generator.svg?style=flat-square)](https://packagist.org/packages/blainerohmer/yml-generator)
[![Total Downloads](https://img.shields.io/packagist/dt/blainerohmer/yml-generator.svg?style=flat-square)](https://packagist.org/packages/blainerohmer/yml-generator)

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

Usage example
-------------

```php
<?php

use blainerohmer\YmlGenerator\Model\Offer\OfferSimple;
use blainerohmer\YmlGenerator\Model\Category;
use blainerohmer\YmlGenerator\Model\Currency;
use blainerohmer\YmlGenerator\Model\ShopInfo;
use blainerohmer\YmlGenerator\Settings;
use blainerohmer\YmlGenerator\Generator;

$file = tempnam(sys_get_temp_dir(), 'YMLGenerator');
$settings = (new Settings())
    ->setOutputFile($file)
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

(new Generator($settings))->generate(
    $shopInfo,
    $currencies,
    $categories,
    $offers
);
```

Copyright / License
-------------------

See [LICENSE](https://github.com/bukashk0zzz/YmlGenerator/blob/master/LICENSE)
