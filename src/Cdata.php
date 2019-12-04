<?php

/*
 * This file is part of the Bukashk0zzzYmlGenerator
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bukashk0zzz\YmlGenerator;

/**
 * Represents a value that should be written to XML as CDATA
 */
class Cdata
{
    /**
     * @var string
     */
    private $value;

    /**
     * @param string $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * Allows to get the wrapped value by casting an instance to string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->value;
    }
}
