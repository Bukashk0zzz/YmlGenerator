<?php

/*
 * This file is part of the blainerohmerYmlGenerator
 *
 * (c) Denis Golubovskiy <blainerohmer@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace blainerohmer\YmlGenerator\Tests;

use Faker\Factory as Faker;
use blainerohmer\YmlGenerator\Model\Category;
use blainerohmer\YmlGenerator\Model\Currency;
use blainerohmer\YmlGenerator\Model\ShopInfo;
use blainerohmer\YmlGenerator\Model\Delivery;
use blainerohmer\YmlGenerator\Settings;
use blainerohmer\YmlGenerator\Generator;

/**
 * Abstract Generator test
 *
 * @author Denis Golubovskiy <blainerohmer@gmail.com>
 */
abstract class AbstractGeneratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * @var Settings
     */
    protected $settings;

    /**
     * @var ShopInfo
     */
    protected $shopInfo;

    /**
     * @var array
     */
    protected $currencies;

    /**
     * @var array
     */
    protected $categories;

    /**
     * @var array
     */
    protected $deliveries;

    /**
     * @var string
     */
    protected $offerType;

    /**
     * @return \blainerohmer\YmlGenerator\Model\Offer\AbstractOffer
     */
    abstract protected function createOffer();

    /**
     * Test setup
     */
    public function setUp()
    {
        $this->faker = Faker::create();

        $this->settings = $this->createSettings();
        $this->shopInfo = $this->createShopInfo();
        $this->currencies = $this->createCurrencies();
        $this->categories = $this->createCategories();
        $this->deliveries = $this->createDeliveries();
    }

    /**
     * Test generation
     */
    protected function runGeneratorTest()
    {
        static::assertTrue((new Generator($this->settings))->generate(
            $this->shopInfo,
            $this->deliveries,
            $this->currencies,
            $this->categories,
            $this->createOffers()
        ));

        $this->validateFileWithDtd();
    }

    /**
     * Validate yml file using dtd
     */
    private function validateFileWithDtd()
    {
        $systemId = 'data://text/plain;base64,'.base64_encode(file_get_contents(__DIR__.'/dtd/'.$this->offerType.'.dtd'));
        $root = 'yml_catalog';

        $ymlFile = new \DOMDocument();
        $ymlFile->loadXML(file_get_contents($this->settings->getOutputFile()));

        $creator = new \DOMImplementation();
        $ymlFileWithDtd = $creator->createDocument(null, null, $creator->createDocumentType($root, null, $systemId));
        $ymlFileWithDtd->encoding = 'windows-1251';

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
     * @return Settings
     */
    private function createSettings()
    {
        return (new Settings())
            ->setOutputFile(tempnam(sys_get_temp_dir(), 'YMLGeneratorTest'))
            ->setEncoding('utf-8')
            ->setIndentString("\t")
        ;
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
    private function createDeliveries()
    {
        $deliveries = [];
        $deliveries[] = (new Delivery())
            ->setCost(1)
            ->setDays(2)
        ;

        $deliveries[] = (new Delivery())
            ->setCost(2)
            ->setDays(1)
            ->setOrderBefore(14)
        ;

        return $deliveries;
    }

    /**
     * @return array
     */
    private function createOffers()
    {
        $offers = [];
        foreach (range(1, 2) as $id) {
            $offers[] = $this
                ->createOffer()
                ->setId($id)
                ->setAvailable($this->faker->boolean)
                ->setUrl($this->faker->url)
                ->setPrice($this->faker->numberBetween(1, 9999))
                ->setCurrencyId('UAH')
                ->setCategoryId($id)
                ->setDelivery($this->faker->boolean)
                ->setLocalDeliveryCost($this->faker->numberBetween(1, 9999))
                ->setDescription($this->faker->sentence)
                ->setSalesNotes($this->faker->text(45))
                ->setManufacturerWarranty($this->faker->boolean)
                ->setCountryOfOrigin('Украина')
                ->setDownloadable($this->faker->boolean)
                ->setAdult($this->faker->boolean)
            ;
        }

        return $offers;
    }
}
