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
 * Class OfferTour
 */
class OfferTour extends AbstractOffer
{
    /**
     * @var string
     */
    private $worldRegion;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $region;

    /**
     * @var int
     */
    private $days;

    /**
     * @var array
     */
    private $dataTour;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $hotelStars;

    /**
     * @var string
     */
    private $room;

    /**
     * @var string
     */
    private $meal;

    /**
     * @var string
     */
    private $included;

    /**
     * @var string
     */
    private $transport;

    /**
     * @return string
     */
    public function getType()
    {
        return 'tour';
    }

    /**
     * @return string
     */
    public function getWorldRegion()
    {
        return $this->worldRegion;
    }

    /**
     * @param string $worldRegion
     *
     * @return $this
     */
    public function setWorldRegion($worldRegion)
    {
        $this->worldRegion = $worldRegion;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     *
     * @return $this
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param string $region
     *
     * @return $this
     */
    public function setRegion($region)
    {
        $this->region = $region;

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
     * @return $this
     */
    public function setDays($days)
    {
        $this->days = $days;

        return $this;
    }

    /**
     * @return array
     */
    public function getDataTour()
    {
        return $this->dataTour;
    }

    /**
     * @param string $dataTour
     *
     * @return $this
     */
    public function addDataTour($dataTour)
    {
        $this->dataTour[] = $dataTour;

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
    public function getHotelStars()
    {
        return $this->hotelStars;
    }

    /**
     * @param string $hotelStars
     *
     * @return $this
     */
    public function setHotelStars($hotelStars)
    {
        $this->hotelStars = $hotelStars;

        return $this;
    }

    /**
     * @return string
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * @param string $room
     *
     * @return $this
     */
    public function setRoom($room)
    {
        $this->room = $room;

        return $this;
    }

    /**
     * @return string
     */
    public function getMeal()
    {
        return $this->meal;
    }

    /**
     * @param string $meal
     *
     * @return $this
     */
    public function setMeal($meal)
    {
        $this->meal = $meal;

        return $this;
    }

    /**
     * @return string
     */
    public function getIncluded()
    {
        return $this->included;
    }

    /**
     * @param string $included
     *
     * @return $this
     */
    public function setIncluded($included)
    {
        $this->included = $included;

        return $this;
    }

    /**
     * @return string
     */
    public function getTransport()
    {
        return $this->transport;
    }

    /**
     * @param string $transport
     *
     * @return $this
     */
    public function setTransport($transport)
    {
        $this->transport = $transport;

        return $this;
    }

    /**
     * @return array
     */
    protected function getOptions()
    {
        return [
            'worldRegion' => $this->getWorldRegion(),
            'country' => $this->getCountry(),
            'region' => $this->getRegion(),
            'days' => $this->getDays(),
            'dataTour' => $this->getDataTour(),
            'name' => $this->getName(),
            'hotel_stars' => $this->getHotelStars(),
            'room' => $this->getRoom(),
            'meal' => $this->getMeal(),
            'included' => $this->getIncluded(),
            'transport' => $this->getTransport(),
        ];
    }
}
