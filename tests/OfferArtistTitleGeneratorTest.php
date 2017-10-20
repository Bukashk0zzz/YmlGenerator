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

use Bukashk0zzz\YmlGenerator\Model\Offer\OfferArtistTitle;

/**
 * Generator test
 */
class OfferArtistTitleGeneratorTest extends AbstractGeneratorTest
{
    /**
     * Test generate
     */
    public function testGenerate()
    {
        $this->offerType = 'ArtistTitle';
        $this->runGeneratorTest();
    }

    /**
     * {@inheritdoc}
     */
    protected function createOffer()
    {
        return (new OfferArtistTitle())
            ->setArtist($this->faker->name)
            ->setTitle($this->faker->name)
            ->setYear($this->faker->numberBetween(1, 9999))
            ->setMedia($this->faker->name)
        ;
    }
}
