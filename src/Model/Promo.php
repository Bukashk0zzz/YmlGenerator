<?php

/*
 * This file is part of the Bukashk0zzzYmlGenerator
 *
 * (c) Denis Golubovskiy <bukashk0zzz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bukashk0zzz\YmlGenerator\Model;

use Illuminate\Support\Carbon;

/** USE*/
//    $promos = collect([
//     (new Promo)->setId(1)->setType('promo code')
//         ->setStartDate(now())
//         ->setEndDate(now()->addDays(2))
//         ->setPromocode('PROMOCODE')
//         ->setUrl('https://google.com')
//         ->setDiscount(['unit' => 'percent', 'value' => 5])
//         ->setPurchase([1, 2, 3]),
// ]);

/**
 * Class Promo
 */
class Promo
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $startDate;

    /**
     * @var string
     */
    private $endDate;

    /**
     * @var string
     */
    private $promocode;

    /**
     * @var array
     */
    private $discount = ['unit' => 'percent', 'value' => 5];

    /**
     * @var array
     */
    private $purchase;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  string  $id
     * @return Promo
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param  string  $type
     * @return Promo
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param  Carbon  $startDate
     * @return Promo
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param  Carbon  $endDate
     * @return Promo
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getPromocode()
    {
        return $this->promocode;
    }

    /**
     * @param  string  $promocode
     * @return Promo
     */
    public function setPromocode($promocode)
    {
        $this->promocode = $promocode;

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
     * @param  string  $url
     * @return Promo
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return array
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * $discount = ['unit' => 'percent' , "value" => 0-95] ||  ['unit' => 'currency' , 'currency'=> "RUB" , "value" => 0-95]
     *
     * @param  array  $discount
     * @return Promo
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * @return array
     */
    public function getPurchase()
    {
        return $this->purchase;
    }

    /**
     * $purchase = [1 ,2 ,3 ] (Ids Offers)
     *
     * @param  array  $purchase
     * @return Promo
     */
    public function setPurchase($purchase)
    {
        $this->purchase = $purchase;

        return $this;
    }
}
