<?php

/*
 * This file is part of the Bukashk0zzzYmlGenerator
 *
 * (c) Denis Golubovskiy <bukashk0zzz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bukashk0zzz\YmlGenerator\Models\Offer;

/**
 * Class Offer
 *
 * @author Denis Golubovskiy <bukashk0zzz@gmail.com>
 */
class OfferSimple extends AbstractOffer
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var bool
     */
    private $delivery;

    /**
     * @var float
     */
    private $localDeliveryCost;

    /**
     * @var string
     */
    private $vendor;

    /**
     * @var string
     */
    private $vendorCode;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $countryOfOrigin;

    /**
     * @var bool
     */
    private $adult;

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'url' => $this->getUrl(),
            'price' => $this->getPrice(),
            'currencyId' => $this->getCurrencyId(),
            'categoryId' => $this->getCategoryId(),

            'delivery' => $this->isDelivery(),
            'local_delivery_cost' => $this->getLocalDeliveryCost(),
            'name' => $this->getName(),
            'vendor' => $this->getVendor(),
            'vendorCode' => $this->getVendorCode(),
            'description' => $this->getDescription(),
            'country_of_origin' => $this->getCountryOfOrigin(),
            'adult' => $this->isAdult(),
        ];
    }

    /**
     * @return string
     */
    public function getType()
    {
        return null;
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
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isDelivery()
    {
        return $this->delivery;
    }

    /**
     * @param boolean $delivery
     * @return $this
     */
    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;

        return $this;
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
    public function getVendor()
    {
        return $this->vendor;
    }

    /**
     * @param string $vendor
     * @return $this
     */
    public function setVendor($vendor)
    {
        $this->vendor = $vendor;

        return $this;
    }

    /**
     * @return string
     */
    public function getVendorCode()
    {
        return $this->vendorCode;
    }

    /**
     * @param string $vendorCode
     * @return $this
     */
    public function setVendorCode($vendorCode)
    {
        $this->vendorCode = $vendorCode;

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
     * @return $this
     */
    public function setCountryOfOrigin($countryOfOrigin)
    {
        $this->countryOfOrigin = $countryOfOrigin;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isAdult()
    {
        return $this->adult;
    }

    /**
     * @param boolean $adult
     * @return $this
     */
    public function setAdult($adult)
    {
        $this->adult = $adult;

        return $this;
    }
}
