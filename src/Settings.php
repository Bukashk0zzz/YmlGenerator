<?php

/*
 * This file is part of the Bukashk0zzzYmlGenerator
 *
 * (c) Denis Golubovskiy <bukashk0zzz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bukashk0zzz\YmlGenerator;

/**
 * Class Settings
 */
class Settings
{
    /**
     * Xml file encoding
     *
     * @var string
     */
    protected $encoding = 'windows-1251';

    /**
     * Output file name. If null 'php://output' is used.
     *
     * @var string|null
     */
    protected $outputFile;

    /**
     * If true Generator will return generated YML string.
     * Not recommended to use this for big catalogs because of heavy memory usage.
     *
     * @var bool
     */
    protected $returnResultYMLString = false;

    /**
     * Indent string in xml file. False or null means no indent;
     *
     * @var string
     */
    protected $indentString = "\t";

    /**
     * @return string
     */
    public function getEncoding()
    {
        return $this->encoding;
    }

    /**
     * @param string $encoding
     *
     * @return Settings
     */
    public function setEncoding($encoding)
    {
        $this->encoding = $encoding;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOutputFile()
    {
        return $this->outputFile;
    }

    /**
     * @param string|null $outputFile
     *
     * @return Settings
     */
    public function setOutputFile($outputFile)
    {
        $this->outputFile = $outputFile;

        return $this;
    }

    /**
     * @return string
     */
    public function getIndentString()
    {
        return $this->indentString;
    }

    /**
     * @param string $indentString
     *
     * @return Settings
     */
    public function setIndentString($indentString)
    {
        $this->indentString = $indentString;

        return $this;
    }

    /**
     * @param bool $returnResultYMLString
     *
     * @return Settings
     */
    public function setReturnResultYMLString($returnResultYMLString)
    {
        $this->returnResultYMLString = $returnResultYMLString;

        return $this;
    }

    /**
     * @return bool
     */
    public function getReturnResultYMLString()
    {
        return $this->returnResultYMLString;
    }
}
