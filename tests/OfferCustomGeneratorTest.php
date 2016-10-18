<?php

/*
 * This file is part of the Bukashk0zzzYmlGenerator
 *
 * (c) Denis Golubovskiy <bukashk0zzz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bukashk0zzz\YmlGenerator\Tests;

use Bukashk0zzz\YmlGenerator\Model\Offer\OfferCustom;
use Bukashk0zzz\YmlGenerator\Model\Offer\OfferParam;

/**
 * Generator test
 *
 * @author Denis Golubovskiy <bukashk0zzz@gmail.com>
 */
class OfferCustomGeneratorTest extends AbstractGeneratorTest
{
    /**
     * Test generate
     */
    public function testGenerate()
    {
        $this->offerType = 'Custom';
        $this->runGeneratorTest();
    }

    /**
     * @return array
     */
    protected function createOffers()
    {
        $offers = [];
        foreach (range(1, 5) as $offer) {
            $offers[] = (new OfferCustom())
                ->setId($offer)
                ->setAvailable($this->faker->boolean)
                ->setUrl($this->faker->url)
                ->setPrice($this->faker->numberBetween(1, 9999))
                ->setCurrencyId('UAH')
                ->setCategoryId($offer)
                ->setName($this->faker->name)
                ->setDelivery($this->faker->boolean)
                ->setLocalDeliveryCost($this->faker->numberBetween(1, 9999))
                ->setVendor($this->faker->company)
                ->setVendorCode($this->faker->companySuffix)
                ->setDescription($this->faker->sentence)
                ->setCountryOfOrigin('Украина')
                ->setAdult($this->faker->boolean)
                ->setTypePrefix($this->faker->colorName)
                ->setModel($this->faker->userName)
                ->setSalesNotes($this->faker->text(45))
                ->setManufacturerWarranty($this->faker->boolean)
                ->setDownloadable($this->faker->boolean)
                ->addParam(
                    (new OfferParam())
                        ->setName($this->faker->name)
                        ->setUnit($this->faker->text(5))
                        ->setValue($this->faker->text(10))
                )
            ;
        }

        return $offers;
    }
}
