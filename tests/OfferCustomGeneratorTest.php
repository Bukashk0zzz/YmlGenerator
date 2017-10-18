<?php

/*
 * This file is part of the blainerohmerYmlGenerator
 *
 * (c) Denis Golubovskiy <bukashk0zzz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace blainerohmer\YmlGenerator\Tests;

use blainerohmer\YmlGenerator\Model\Offer\OfferCustom;
use blainerohmer\YmlGenerator\Model\Offer\OfferParam;

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
     * {@inheritdoc}
     */
    protected function createOffer()
    {
        return (new OfferCustom())
            ->setTypePrefix($this->faker->colorName)
            ->setVendor($this->faker->company)
            ->setVendorCode($this->faker->companySuffix)
            ->setModel($this->faker->userName)
            ->addParam(
                (new OfferParam())
                    ->setName($this->faker->name)
                    ->setUnit($this->faker->text(5))
                    ->setValue($this->faker->text(10))
            )
        ;
    }
}
