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
 * Class OfferCustom
 *
 * @author Denis Golubovskiy <bukashk0zzz@gmail.com>
 */
class OfferCustom extends OfferSimple
{
    /**
     * @var string
     */
    private $typePrefix;

    /**
     * @var string
     */
    private $model;

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
    private $downloadable;

    /**
     * @var array
     */
    private $params;

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
            'typePrefix' => $this->getTypePrefix(),
            'vendor' => $this->getVendor(),
            'vendorCode' => $this->getVendorCode(),
            'model' => $this->getModel(),
            'description' => $this->getDescription(),
            'sales_notes' => $this->getSalesNotes(),
            'manufacturer_warranty' => $this->isManufacturerWarranty(),
            'country_of_origin' => $this->getCountryOfOrigin(),
            'downloadable' => $this->isDownloadable(),
            'adult' => $this->isAdult(),
        ];
    }

    /**
     * @return string
     */
    public function getType()
    {
        return 'vendor.model';
    }

    /**
     * @return string
     */
    public function getTypePrefix()
    {
        return $this->typePrefix;
    }

    /**
     * @param string $typePrefix
     * @return $this
     */
    public function setTypePrefix($typePrefix)
    {
        $this->typePrefix = $typePrefix;

        return $this;
    }

    /**
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param string $model
     * @return $this
     */
    public function setModel($model)
    {
        $this->model = $model;

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
     * @return $this
     */
    public function setSalesNotes($salesNotes)
    {
        $this->salesNotes = $salesNotes;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isManufacturerWarranty()
    {
        return $this->manufacturerWarranty;
    }

    /**
     * @param boolean $manufacturerWarranty
     * @return $this
     */
    public function setManufacturerWarranty($manufacturerWarranty)
    {
        $this->manufacturerWarranty = $manufacturerWarranty;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isDownloadable()
    {
        return $this->downloadable;
    }

    /**
     * @param boolean $downloadable
     * @return $this
     */
    public function setDownloadable($downloadable)
    {
        $this->downloadable = $downloadable;

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
     * @return $this
     */
    public function addParam(OfferParam $param)
    {
        $this->params[] = $param;

        return $this;
    }
}
