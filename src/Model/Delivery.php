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

/**
 * Class Delivery
 */
class Delivery
{
    /**
     * @var int
     */
    private $cost;

    /**
     * @var int
     */
    private $days;

    /**
     * @var int
     */
    private $orderBefore;

    /**
     * @return int
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param int $cost
     *
     * @return Delivery
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * @return int
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * @param int $days
     *
     * @return Delivery
     */
    public function setDays($days)
    {
        $this->days = $days;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getOrderBefore()
    {
        return $this->orderBefore;
    }

    /**
     * @param int|null $orderBefore
     *
     * @return Delivery
     */
    public function setOrderBefore($orderBefore)
    {
        $this->orderBefore = $orderBefore;

        return $this;
    }
}
