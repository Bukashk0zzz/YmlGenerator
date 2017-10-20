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
 * Class OfferArtistTitle
 */
class OfferArtistTitle extends AbstractOffer
{
    /**
     * @var string
     */
    private $artist;

    /**
     * @var string
     */
    private $title;

    /**
     * @var int
     */
    private $year;

    /**
     * @var string
     */
    private $media;

    /**
     * @return string
     */
    public function getType()
    {
        return 'artist.title';
    }

    /**
     * @return string
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * @param string $artist
     *
     * @return OfferArtistTitle
     */
    public function setArtist($artist)
    {
        $this->artist = $artist;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return OfferArtistTitle
     */
    public function setTitle($title)
    {
        $this->title = $title;

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
     * @return OfferArtistTitle
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * @return string
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * @param string $media
     *
     * @return OfferArtistTitle
     */
    public function setMedia($media)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * @return array
     */
    protected function getOptions()
    {
        return [
            'artist' => $this->getArtist(),
            'title' => $this->getTitle(),
            'year' => $this->getYear(),
            'media' => $this->getMedia(),
        ];
    }
}
