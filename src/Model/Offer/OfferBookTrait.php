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
 * Trait OfferBook
 */
trait OfferBookTrait
{
    /**
     * @var string
     */
    private $author;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $publisher;

    /**
     * @var string
     */
    private $series;

    /**
     * @var int
     */
    private $year;

    /**
     * @var string
     */
    private $ISBN;

    /**
     * @var int
     */
    private $volume;

    /**
     * @var int
     */
    private $part;

    /**
     * @var string
     */
    private $language;

    /**
     * @var string
     */
    private $tableOfContents;

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     *
     * @return $this
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * @param string $publisher
     *
     * @return $this
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;

        return $this;
    }

    /**
     * @return string
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * @param string $series
     *
     * @return $this
     */
    public function setSeries($series)
    {
        $this->series = $series;

        return $this;
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param int $year
     *
     * @return $this
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * @return string
     */
    public function getISBN()
    {
        return $this->ISBN;
    }

    /**
     * @param string $ISBN
     *
     * @return $this
     */
    public function setISBN($ISBN)
    {
        $this->ISBN = $ISBN;

        return $this;
    }

    /**
     * @return int
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * @param int $volume
     *
     * @return $this
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;

        return $this;
    }

    /**
     * @return int
     */
    public function getPart()
    {
        return $this->part;
    }

    /**
     * @param int $part
     *
     * @return $this
     */
    public function setPart($part)
    {
        $this->part = $part;

        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     *
     * @return $this
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return string
     */
    public function getTableOfContents()
    {
        return $this->tableOfContents;
    }

    /**
     * @param string $tableOfContents
     *
     * @return $this
     */
    public function setTableOfContents($tableOfContents)
    {
        $this->tableOfContents = $tableOfContents;

        return $this;
    }
}
