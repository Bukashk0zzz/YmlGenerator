<?php

/*
 * This file is part of the blainerohmerYmlGenerator
 *
 * (c) Denis Golubovskiy <bukashk0zzz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace blainerohmer\YmlGenerator\Model;

/**
 * Class Delivery
 *
 * @author Denis Golubovskiy <bukashk0zzz@gmail.com>
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
    private $order_before;

    /**
     * @return int
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param int $cost
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
     * @return Delivery
     */
    public function setDays($days)
    {
        $this->days = $days;

        return $this;
    }

    /**
     * @return string
     */
    public function getOrderBefore()
    {
        return $this->order_before;
    }

    /**
     * @param string $order_before
     * @return Delivery
     */
    public function setOrderBefore($order_before)
    {
        $this->order_before = $order_before;

        return $this;
    }
}
