<?php

namespace Bukashk0zzz\YmlGenerator\Model\Offer;

/**
 * Class OfferCondition
 */
class OfferCondition
{

    /**
     * @var string
     */
    private $type;


    /**
     * @var string
     */
    private $reasonText;


    /**
     * @return string
     */
    public function getReasonText()
    {

        return $this->reasonText;
    }


    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Description text for the reason for markdowns
     *
     * @param $reasonText
     *
     * @return $this
     */
    public function setReasonText($reasonText)
    {
        $this->reasonText = $reasonText;

        return $this;
    }


    /**
     * Set product condition
     *
     * @param string $type
     *
     * @return $this
     */
    public function setType($type)
    {

        $this->type = $type;

        return $this;
    }
}