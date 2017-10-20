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

/**
 * Interface Offer
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
