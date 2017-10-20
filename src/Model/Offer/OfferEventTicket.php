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
 * Class OfferEventTicket
 */
class OfferEventTicket extends AbstractOffer
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $place;

    /**
     * @var string
     */
    private $date;

    /**
     * @var int
     */
    private $premiere;

    /**
     * @var int
     */
    private $kids;

    /**
     * @return string
     */
    public function getType()
    {
        return 'event-ticket';
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
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param string $place
     *
     * @return $this
     */
    public function setPlace($place)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $date
     *
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return int
     */
    public function getPremiere()
    {
        return $this->premiere;
    }

    /**
     * @param int $premiere
     *
     * @return $this
     */
    public function setPremiere($premiere)
    {
        $this->premiere = $premiere;

        return $this;
    }

    /**
     * @return int
     */
    public function getKids()
    {
        return $this->kids;
    }

    /**
     * @param int $kids
     *
     * @return $this
     */
    public function setKids($kids)
    {
        $this->kids = $kids;

        return $this;
    }

    /**
     * @return array
     */
    protected function getOptions()
    {
        return [
            'name' => $this->getName(),
            'place' => $this->getPlace(),
            'date' => $this->getDate(),
            'is_premiere' => $this->getPremiere(),
            'is_kids' => $this->getKids(),
        ];
    }
}
