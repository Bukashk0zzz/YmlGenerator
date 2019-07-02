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
class OfferCustomElementsGeneratorTest extends AbstractGeneratorTest
{
    const CDATA_TEST_STRING = '<p>Simple HTML</p></description></offer><![CDATA[';
    const OFFER_COUNT = 2;

    /**
     * Test generate
     */
    public function testGenerate()
    {
        // Don't call $this->validateFileWithDtd() here because custom elements are not included into the default DTD
        $this->generateFile();
        $this->checkCustomElements();
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
        $offer = (new OfferSimple())
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
            ->setDescription($this->faker->sentence)
            ->setVendorCode(null)
            ->setPickup(true)
            ->setGroupId($this->faker->numberBetween())
            ->addPicture('http://example.com/example.jpeg')
            ->addBarcode($this->faker->ean13)

            ->setCustomElements(['custom_element' => [100500, 'string value']])
            ->addCustomElement('custom_element', true)
            ->addCustomElement('custom_element', false)
            ->addCustomElement('custom_element', null) // Should not be written
            ->addCustomElement('custom_element', $cdata = new Cdata(self::CDATA_TEST_STRING))
            ->addCustomElement('stock_quantity', 100) // https://rozetka.com.ua/sellerinfo/pricelist/
        ;

        $this->assertSame([100500, 'string value', true, false, $cdata], $offer->getCustomElementByType('custom_element'));
        $this->assertSame([100], $offer->getCustomElementByType('stock_quantity'));
        $this->assertSame([], $offer->getCustomElementByType('non_existent_element'));

        return $offer;
    }

    /**
     * Load generated XML file and check custom elements
     */
    private function checkCustomElements()
    {
        // Much easier to test with SimpleXML tahn with DOM
        $yml = \simplexml_load_file($this->settings->getOutputFile());

        $offers = $yml->shop->offers->offer;
        $this->assertNotEmpty($offers);
        $this->assertEquals(self::OFFER_COUNT, \count($offers));

        foreach ($offers as $offer) {
            $prop = 'stock_quantity';
            $this->assertSame(100, (int) $offer->$prop); // Can't use $offer->stock_quantity because of CS rules

            $prop = 'custom_element';
            $multipleElements = $offer->$prop; // Can't use $offer->custom_element because of CS rules
            $this->assertNotEmpty($multipleElements);

            // Verity each added value
            $this->assertSame(100500, (int) $multipleElements[0]);
            $this->assertSame('string value', (string) $multipleElements[1]);
            $this->assertSame('true', (string) $multipleElements[2]);
            $this->assertSame('false', (string) $multipleElements[3]);

            // ->addCustomElement('custom_element', null) must not produce an element

            $this->assertSame(self::CDATA_TEST_STRING, (string) $multipleElements[4]);
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
