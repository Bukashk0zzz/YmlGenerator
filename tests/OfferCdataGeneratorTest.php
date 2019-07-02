<?php

/*
 * This file is part of the Bukashk0zzzYmlGenerator
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bukashk0zzz\YmlGenerator\Tests;

use Bukashk0zzz\YmlGenerator\Cdata;
use Bukashk0zzz\YmlGenerator\Model\Offer\OfferSimple;

/**
 * Generator test
 */
class OfferCdataGeneratorTest extends AbstractGeneratorTest
{
    const CDATA_TEST_STRING = '<p>Simple HTML</p></description></offer><![CDATA[';
    const OFFER_COUNT = 2;

    /**
     * Test generate
     */
    public function testGenerate()
    {
        $this->offerType = 'Simple';
        $this->runGeneratorTest();
        $this->checkCdata();
    }

    /**
     * Need to override parent::createOffers() in order to avoid setting description
     * after calling self::createOffer()
     *
     * {@inheritdoc}
     *
     * @see \Bukashk0zzz\YmlGenerator\Tests\AbstractGeneratorTest::createOffers()
     */
    protected function createOffers()
    {
        $offers = [];
        foreach (\range(1, self::OFFER_COUNT) as $id) {
            $offers[] =
                $this->createOffer()
                    ->setId($id)
                    ->setCategoryId($id)
                ;
        }

        return $offers;
    }

    /**
     * Set the test description with CDATA here
     *
     * {@inheritdoc}
     *
     * @see \Bukashk0zzz\YmlGenerator\Tests\AbstractGeneratorTest::createOffer()
     */
    protected function createOffer()
    {
        return (new OfferSimple())
            ->setAvailable($this->faker->boolean)
            ->setUrl($this->faker->url)
            ->setPrice($this->faker->numberBetween(1, 9999))
            ->setOldPrice($this->faker->numberBetween(1, 9999))
            ->setWeight($this->faker->numberBetween(1, 9999))
            ->setCurrencyId('UAH')
            ->setDelivery($this->faker->boolean)
            ->setLocalDeliveryCost($this->faker->numberBetween(1, 9999))
            ->setSalesNotes($this->faker->text(45))
            ->setManufacturerWarranty($this->faker->boolean)
            ->setCountryOfOrigin('Украина')
            ->setDownloadable($this->faker->boolean)
            ->setAdult($this->faker->boolean)
            ->setMarketCategory($this->faker->word)
            ->setCpa($this->faker->numberBetween(0, 1))
            ->setBarcodes([$this->faker->ean13, $this->faker->ean13])

            ->setName($this->faker->name)
            ->setVendor($this->faker->company)
            ->setDescription($this->makeDescription())
            ->setVendorCode(null)
            ->setPickup(true)
            ->setGroupId($this->faker->numberBetween())
            ->addPicture('http://example.com/example.jpeg')
            ->addBarcode($this->faker->ean13)
        ;
    }

    /**
     * Retreive and check CDATA from the generated file
     */
    private function checkCdata()
    {
        $ymlFile = new \DOMDocument();
        $ymlFile->loadXML(\file_get_contents($this->settings->getOutputFile()));

        $xpath = new \DOMXPath($ymlFile);
        $descriptionNodes = $xpath->query('//yml_catalog/shop/offers/offer/description');
        self::assertNotFalse($descriptionNodes);

        // One description per offer is expected
        self::assertEquals(self::OFFER_COUNT, $descriptionNodes->length);

        foreach ($descriptionNodes as $descriptionNode) {
            $description = $descriptionNode->nodeValue;

            self::assertSame(self::CDATA_TEST_STRING, $description);
        }
    }

    /**
     * Create instance of Cdata class with a predefined test string
     *
     * @return \Bukashk0zzz\YmlGenerator\Cdata
     */
    private function makeDescription()
    {
        return new Cdata(self::CDATA_TEST_STRING);
    }
}
