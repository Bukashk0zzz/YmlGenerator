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

use Bukashk0zzz\YmlGenerator\Model\Offer\OfferSimple;

/**
 * Generator test
 *
 * @author Denis Golubovskiy <bukashk0zzz@gmail.com>
 */
class OfferSimpleGeneratorTest extends AbstractGeneratorTest
{
    /**
     * Test generate
     */
    public function testGenerate()
    {
        $this->offerType = 'Simple';
        $this->runGeneratorTest();
    }

    /**
     * @return array
     */
    protected function createOffers()
    {
        $offers = [];
        foreach (range(1, 5) as $offer) {
            $offers[] = (new OfferSimple())
                ->setId($offer)
                ->setName($this->faker->name)
                ->setAvailable($this->faker->boolean)
                ->setUrl($this->faker->url)
                ->setPrice($this->faker->numberBetween(1, 9999))
                ->setCurrencyId('UAH')
                ->setCategoryId(1)
                ->setName($this->faker->name)
                ->setDelivery($this->faker->boolean)
                ->setLocalDeliveryCost($this->faker->numberBetween(1, 9999))
                ->setVendor($this->faker->company)
                ->setVendorCode($this->faker->companySuffix)
                ->setDescription($this->faker->sentence)
                ->setCountryOfOrigin('Украина')
                ->setAdult($this->faker->boolean)
            ;
        }

        return $offers;
    }
}
