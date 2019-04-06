<?php

namespace Bukashk0zzz\YmlGenerator;

/**
 * Represents a value that should be written to XML as CDATA
 * @author zyura (https://github.com/zyura)
 */
class Cdata {
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

    public function __toString()
    {
        return $this->value;
    }
}