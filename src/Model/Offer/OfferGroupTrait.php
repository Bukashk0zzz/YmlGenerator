<?php

/*
 * This file is part of the Bukashk0zzzYmlGenerator package.
 *
 * (c) Gennady Knyazkin <dev@gennadyx.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bukashk0zzz\YmlGenerator\Model\Offer;

/**
 * Trait OfferGroupTrait
 *
 * @author Gennady Knyazkin <dev@gennadyx.tech>
 */
trait OfferGroupTrait
{
    /**
     * @var int
     */
    protected $groupId;

    /**
     * Get groupId
     *
     * @return int|null
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * Set groupId
     *
     * @param int $groupId
     *
     * @return $this
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;

        return $this;
    }
}
