<?php

/*
 * This file is part of the Bukashk0zzzYmlGenerator
 *
 * (c) Denis Golubovskiy <bukashk0zzz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bukashk0zzz\YmlGenerator\Model\Offer;

use Bukashk0zzz\YmlGenerator\Model\Delivery;

/**
 * Abstract Class Offer
 */
abstract class AbstractOffer implements OfferInterface
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var bool
     */
    private $available;

    /**
     * @var string
     */
    private $url;

    /**
     * @var float
     */
    private $price;

    /**
     * @var float
     */
    private $oldPrice;

    /**
     * @var float
     */
    private $purchasePrice;

    /**
     * @var string
     */
    private $currencyId;

    /**
     * @var int
     */
    private $categoryId;

    /**
     * @var array
     */
    private $categoriesId = [];

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $marketCategory;

    /**
     * @var bool
     */
    private $adult;

    /**
     * @var string
     */
    private $salesNotes;

    /**
     * @var bool
     */
    private $manufacturerWarranty;

    /**
     * @var bool
     */
    private $pickup;

    /**
     * @var bool
     */
    private $downloadable;

    /**
     * @var bool
     */
    private $delivery;

    /**
     * @var float
     */
    private $localDeliveryCost;

    /**
     * @var array
     */
    private $deliveryOptions = [];

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $countryOfOrigin;

    /**
     * @var string
     */
    private $weight;

    /**
     * @var string
     */
    private $dimensions;

    /**
     * @var int
     */
    private $cpa;

    /**
     * @var string[]
     */
    private $barcodes;

    /**
     * @var array
     */
    private $pictures = [];

    /**
     * @var array
     */
    private $params = [];

    /**
     * @var bool
     */
    private $store;

    /**
     * @var bool
     */
    private $autoDiscount;

    /**
     * Array of custom elements (element types are keys) of arrays of element values
     * There may be multiple elements of the same type
     *
     * @var array[]
     */
    private $customElements;

    /**
     * @var OfferCondition
     */
    private $condition;

    /**
     * @return array
     */
    public function toArray()
    {
        return \array_merge($this->getHeaderOptions(), $this->getOptions(), $this->getFooterOptions());
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAvailable()
    {
        return $this->available;
    }

    /**
     * @param bool $available
     *
     * @return $this
     */
    public function setAvailable($available)
    {
        $this->available = $available;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     *
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return float
     */
    public function getOldPrice()
    {
        return $this->oldPrice;
    }

    /**
     * @param float $oldPrice
     *
     * @return $this
     */
    public function setOldPrice($oldPrice)
    {
        $this->oldPrice = $oldPrice;

        return $this;
    }

    /**
     * @return float
     */
    public function getPurchasePrice()
    {
        return $this->purchasePrice;
    }

    /**
     * @param float $purchasePrice
     *
     * @return $this
     */
    public function setPurchasePrice($purchasePrice)
    {
        $this->purchasePrice = $purchasePrice;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrencyId()
    {
        return $this->currencyId;
    }

    /**
     * @param string $currencyId
     *
     * @return $this
     */
    public function setCurrencyId($currencyId)
    {
        $this->currencyId = $currencyId;

        return $this;
    }

    /**
     * @return int
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param int $categoryId
     *
     * @return $this
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * @return array
     */
    public function getCategoriesId()
    {
        return $this->categoriesId;
    }

    /**
     * @param array $categoriesId
     *
     * @return $this
     */
    public function setCategoriesId(array $categoriesId)
    {
        $this->categoriesId = $categoriesId;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getMarketCategory()
    {
        return $this->marketCategory;
    }

    /**
     * @param string $marketCategory
     *
     * @return $this
     */
    public function setMarketCategory($marketCategory)
    {
        $this->marketCategory = $marketCategory;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAdult()
    {
        return $this->adult;
    }

    /**
     * @param bool $adult
     *
     * @return $this
     */
    public function setAdult($adult)
    {
        $this->adult = $adult;

        return $this;
    }

    /**
     * @return string
     */
    public function getSalesNotes()
    {
        return $this->salesNotes;
    }

    /**
     * @param string $salesNotes
     *
     * @return $this
     */
    public function setSalesNotes($salesNotes)
    {
        $this->salesNotes = $salesNotes;

        return $this;
    }

    /**
     * @return bool
     */
    public function isManufacturerWarranty()
    {
        return $this->manufacturerWarranty;
    }

    /**
     * @param bool $manufacturerWarranty
     *
     * @return $this
     */
    public function setManufacturerWarranty($manufacturerWarranty)
    {
        $this->manufacturerWarranty = $manufacturerWarranty;

        return $this;
    }

    /**
     * @return bool
     */
    public function isPickup()
    {
        return $this->pickup;
    }

    /**
     * @param bool $pickup
     *
     * @return $this
     */
    public function setPickup($pickup)
    {
        $this->pickup = $pickup;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDownloadable()
    {
        return $this->downloadable;
    }

    /**
     * @param bool $downloadable
     *
     * @return $this
     */
    public function setDownloadable($downloadable)
    {
        $this->downloadable = $downloadable;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDelivery()
    {
        return $this->delivery;
    }

    /**
     * @param bool $delivery
     *
     * @return $this
     */
    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;

        return $this;
    }

    /**
     * @return array
     */
    public function getDeliveryOptions()
    {
        return $this->deliveryOptions;
    }

    /**
     * @param Delivery $option
     *
     * @return $this
     */
    public function addDeliveryOption(Delivery $option)
    {
        $this->deliveryOptions[] = $option;

        return $this;
    }

    /**
     * @param bool $store
     *
     * @return $this
     */
    public function setStore($store)
    {
        $this->store = $store;

        return $this;
    }

    /**
     * @return bool
     */
    public function isStore()
    {
        return $this->store;
    }

    /**
     * @return float
     */
    public function getLocalDeliveryCost()
    {
        return $this->localDeliveryCost;
    }

    /**
     * @param float $localDeliveryCost
     *
     * @return $this
     */
    public function setLocalDeliveryCost($localDeliveryCost)
    {
        $this->localDeliveryCost = $localDeliveryCost;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountryOfOrigin()
    {
        return $this->countryOfOrigin;
    }

    /**
     * @param string $countryOfOrigin
     *
     * @return $this
     */
    public function setCountryOfOrigin($countryOfOrigin)
    {
        $this->countryOfOrigin = $countryOfOrigin;

        return $this;
    }

    /**
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param string $weight
     *
     * @return $this
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return string
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * @param float $length
     * @param float $width
     * @param float $height
     *
     * @return $this
     */
    public function setDimensions($length, $width, $height)
    {
        $dimensions = [
            \round((float) $length, 3),
            \round((float) $width, 3),
            \round((float) $height, 3),
        ];

        $this->dimensions = \implode('/', $dimensions);

        return $this;
    }

    /**
     * @return int
     */
    public function getCpa()
    {
        return $this->cpa;
    }

    /**
     * @param int $cpa
     *
     * @return $this
     */
    public function setCpa($cpa)
    {
        $this->cpa = $cpa;

        return $this;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param OfferParam $param
     *
     * @return $this
     */
    public function addParam(OfferParam $param)
    {
        $this->params[] = $param;

        return $this;
    }

    /**
     * Add picture
     *
     * @param string $url
     *
     * @return $this
     */
    public function addPicture($url)
    {
        if (\count($this->pictures) < 10) {
            $this->pictures[] = $url;
        }

        return $this;
    }

    /**
     * Set pictures
     *
     * @param array $pictures
     *
     * @return $this
     */
    public function setPictures(array $pictures)
    {
        $this->pictures = $pictures;

        return $this;
    }

    /**
     * Get picture list
     *
     * @return array
     */
    public function getPictures()
    {
        return $this->pictures;
    }

    /**
     * Get list of barcodes of the offer
     *
     * @return string[]
     */
    public function getBarcodes()
    {
        return $this->barcodes;
    }

    /**
     * Set list of barcodes for that offer
     *
     * @param string[] $barcodes
     *
     * @return $this
     */
    public function setBarcodes(array $barcodes = [])
    {
        $this->barcodes = $barcodes;

        return $this;
    }

    /**
     * Add one barcode to the collection of barcodes of this offer
     *
     * @param string $barcode
     *
     * @return $this
     */
    public function addBarcode($barcode)
    {
        $this->barcodes[] = $barcode;

        return $this;
    }

    /**
     * Sets list of custom elements
     *
     * @param array $customElements Array (keys are element types) of arrays (element values)
     *
     * @return $this
     */
    public function setCustomElements(array $customElements = [])
    {
        $this->customElements = $customElements;

        return $this;
    }

    /**
     * Add a custom element with given type and value
     * Multiple elements of the same type are supported
     *
     * @param string $elementType
     * @param mixed  $value
     *
     * @return $this
     */
    public function addCustomElement($elementType, $value)
    {
        if ($value !== null) {
            // Add value to the list of values of the given element type creating array when needed
            $this->customElements[$elementType][] = $value;
        }

        return $this;
    }

    /**
     * Returns a list of custom elements
     * Always returns an array even if no custom elements were added
     *
     * @return array
     */
    public function getCustomElements()
    {
        return $this->customElements ?: [];
    }

    /**
     * Returns a list of values for the specified custom element type
     * Always returns an array
     *
     * @param string $elementType
     *
     * @return array
     */
    public function getCustomElementByType($elementType)
    {
        // TODO: Use ?? operator when support for PHP 5.6 is no longer needed
        if (isset($this->customElements[$elementType])) {
            return $this->customElements[$elementType];
        }

        return [];
    }

    /**
     * @return OfferCondition
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * @param OfferCondition $condition
     *
     * @return $this
     */
    public function addCondition(OfferCondition $condition)
    {
        $this->condition = $condition;

        return $this;
    }

    /**
     * @return bool
     */
    public function getAutoDiscount()
    {
        return $this->autoDiscount;
    }

    /**
     * @param bool $autoDiscount
     *
     * @return $this
     */
    public function setAutoDiscount($autoDiscount)
    {
        $this->autoDiscount = $autoDiscount;

        return $this;
    }

    /**
     * @return array
     */
    abstract protected function getOptions();

    /**
     * @return array
     */
    private function getHeaderOptions()
    {
        return [
                'url' => $this->getUrl(),
                'price' => $this->getPrice(),
                'oldprice' => $this->getOldPrice(),
                'purchase_price' => $this->getPurchasePrice(),
                'currencyId' => $this->getCurrencyId(),
                'categoryId' => \array_merge(
                    [$this->getCategoryId()],
                    $this->getCategoriesId()
                ),
                'market_category' => $this->getMarketCategory(),
                'picture' => $this->getPictures(),
                'pickup' => $this->isPickup(),
                'store' => $this->isStore(),
                'delivery' => $this->isDelivery(),
                'local_delivery_cost' => $this->getLocalDeliveryCost(),
                'weight' => $this->getWeight(),
                'dimensions' => $this->getDimensions(),
                'name' => $this->getName(),
                'enable_auto_discounts' => $this->getAutoDiscount(),
            ] + $this->getCustomElements();
    }

    /**
     * @return array
     */
    private function getFooterOptions()
    {
        return [
            'description' => $this->getDescription(),
            'sales_notes' => $this->getSalesNotes(),
            'manufacturer_warranty' => $this->isManufacturerWarranty(),
            'country_of_origin' => $this->getCountryOfOrigin(),
            'downloadable' => $this->isDownloadable(),
            'adult' => $this->isAdult(),
            'cpa' => $this->getCpa(),
            'barcode' => $this->getBarcodes(),
        ];
    }
}
