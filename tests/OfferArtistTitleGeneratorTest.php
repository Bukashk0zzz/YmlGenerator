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

use blainerohmer\YmlGenerator\Model\Offer\OfferArtistTitle;

/**
 * Generator test
 *
 * @author Denis Golubovskiy <bukashk0zzz@gmail.com>
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
