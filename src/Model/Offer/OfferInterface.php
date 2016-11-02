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
 * Interface Offer
 *
 * @author Denis Golubovskiy <bukashk0zzz@gmail.com>
 */
interface OfferInterface
{
    /**
     * @return string
     */
    public function getId();

    /**
     * @return string
     */
    public function getType();

    /**
     * @return bool
     */
    public function isAvailable();

    /**
     * @return array
     */
    public function getParams();

    /**
     * @return array
     */
    public function toArray();
}
