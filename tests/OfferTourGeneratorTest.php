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

use Bukashk0zzz\YmlGenerator\Model\Offer\OfferTour;

/**
 * Generator test
 */
class OfferTourGeneratorTest extends AbstractGeneratorTest
{
    /**
     * Test generate
     */
    public function testGenerate()
    {
        $this->offerType = 'Tour';
        $this->runGeneratorTest();
    }

    /**
     * {@inheritdoc}
     */
    protected function createOffer()
    {
        return (new OfferTour())
            ->setWorldRegion($this->faker->name)
            ->setCountry($this->faker->name)
            ->setRegion($this->faker->name)
            ->setDays($this->faker->numberBetween(1, 9999))
            ->addDataTour($this->faker->date("Y-m-d\TH:i"))
            ->setName($this->faker->name)
            ->setHotelStars($this->faker->name)
            ->setRoom($this->faker->name)
            ->setMeal($this->faker->name)
            ->setIncluded($this->faker->name)
            ->setTransport($this->faker->name)
        ;
    }
}
