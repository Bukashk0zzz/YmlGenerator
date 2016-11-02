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
 * Class Currency
 *
 * @author Denis Golubovskiy <bukashk0zzz@gmail.com>
 */
class Currency
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $rate;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Currency
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param string $rate
     * @return Currency
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }
}
