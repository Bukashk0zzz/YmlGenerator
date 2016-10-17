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

use Bukashk0zzz\YmlGenerator\Models\Offer\OfferSimple;
use Faker\Factory as Faker;
use Bukashk0zzz\YmlGenerator\Models\Category;
use Bukashk0zzz\YmlGenerator\Models\Currency;
use Bukashk0zzz\YmlGenerator\Models\Offer\OfferCustom;
use Bukashk0zzz\YmlGenerator\Models\Offer\OfferParam;
use Bukashk0zzz\YmlGenerator\Generator;
use Bukashk0zzz\YmlGenerator\Models\ShopInfo;
use Bukashk0zzz\YmlGenerator\Settings;

/**
 * Generator test
 *
 * @author Denis Golubovskiy <bukashk0zzz@gmail.com>
 *
 */
class GeneratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Test setup
     */
    public function setUp()
    {
        $this->faker = Faker::create();
    }

    /**
     * Test generate
     */
    public function testGenerate()
    {
        $tmpFileName = tempnam(sys_get_temp_dir(), 'YMLGeneratorTest');
        $settings = (new Settings())
            ->setOutputFile($tmpFileName)
            ->setEncoding('utf-8')
            ->setIndentString("\t")
        ;

        $shopInfo = $this->createShopInfo();
        $currencies = $this->createCurrencies();
        $categories = $this->createCategories();
        $offers = $this->createOffers();

        static::assertTrue((new Generator($settings))->generate($shopInfo, $currencies, $categories, $offers));

        $this->validateFileWithDtd($tmpFileName);
    }

    /**
     * Test exception
     *
     * @expectedException \RuntimeException
     */
    public function testExceptionForIncompatibleAnnotations()
    {
        (new Generator((new Settings())->setOutputFile('')))
            ->generate($this->createShopInfo(), [], [], [])
        ;
    }

    /**
     * @param string $tmpFileName
     */
    private function validateFileWithDtd($tmpFileName)
    {
        $systemId = 'data://text/plain;base64,'.base64_encode(file_get_contents(__DIR__.'/Valid.dtd'));
        $root = 'yml_catalog';

        $ymlFile = new \DOMDocument();
        $ymlFile->loadXML(file_get_contents($tmpFileName));

        $creator = new \DOMImplementation();
        $ymlFileWithDtd = $creator->createDocument(null, null, $creator->createDocumentType($root, null, $systemId));
        $ymlFileWithDtd->encoding = 'utf-8';

        $oldNode = $ymlFile->getElementsByTagName($root)->item(0);
        $newNode = $ymlFileWithDtd->importNode($oldNode, true);
        $ymlFileWithDtd->appendChild($newNode);

        try {
            static::assertTrue($ymlFileWithDtd->validate());
        } catch (\Exception $exception) {
            echo $exception->getMessage();
            static::fail('YML file not valid');
        }
    }

    /**
     * @return ShopInfo
     */
    private function createShopInfo()
    {
        return (new ShopInfo())
            ->setName($this->faker->name)
            ->setCompany($this->faker->company)
            ->setUrl($this->faker->url)
            ->setPlatform($this->faker->name)
            ->setVersion($this->faker->numberBetween(1, 999))
            ->setAgency($this->faker->name)
            ->setEmail($this->faker->email)
        ;
    }

    /**
     * @return array
     */
    private function createCurrencies()
    {
        $currencies = [];
        $currencies[] = (new Currency())
            ->setId('UAH')
            ->setRate(1)
        ;

        return $currencies;
    }

    /**
     * @return array
     */
    private function createCategories()
    {
        $categories = [];
        $categories[] = (new Category())
            ->setId(1)
            ->setName($this->faker->name)
        ;

        $categories[] = (new Category())
            ->setId(2)
            ->setParentId(1)
            ->setName($this->faker->name)
        ;

        return $categories;
    }

    /**
     * @return array
     */
    private function createOffers()
    {
        $offers = [];
        foreach ([1, 2] as $offer) {
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

        $offers[] = (new OfferSimple())
            ->setId(3)
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

        return $offers;
    }
}
