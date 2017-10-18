<?php

/*
 * This file is part of the blainerohmerYmlGenerator
 *
 * (c) Denis Golubovskiy <bukashk0zzz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace blainerohmer\YmlGenerator\Model\Offer;

/**
 * Class OfferCustom
 *
 * @author Denis Golubovskiy <bukashk0zzz@gmail.com>
 */
class OfferCustom extends AbstractOffer
{
    /**
     * @var string
     */
    private $typePrefix;

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
    private $model;

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
        if ($typePrefix != '') {
            $this->typePrefix = $typePrefix;
        }

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
        if ($model != '') {
            $this->model = $model;
        }

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
        if ($vendor != '') {
            $this->vendor = $vendor;
        }

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
        if ($vendorCode != '') {
            $this->vendorCode = $vendorCode;
        }

        return $this;
    }

    /**
     * @return array
     */
    protected function getOptions()
    {
        return [
            'typePrefix' => $this->getTypePrefix(),
            'vendor' => $this->getVendor(),
            'vendorCode' => $this->getVendorCode(),
            'model' => $this->getModel(),
        ];
    }
}
