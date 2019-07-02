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
     * @param string $reasonText
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
