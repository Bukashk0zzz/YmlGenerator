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
     * {@inheritdoc}
     */
    protected function createOffer()
    {
        return (new OfferSimple())
            ->setName($this->faker->name)
            ->setVendor($this->faker->company)
            ->setVendorCode(null)
            ->addPicture('http://example.com/example.jpeg')
        ;
    }
}
