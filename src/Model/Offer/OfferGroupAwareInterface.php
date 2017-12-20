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
 * Interface OfferGroupAwareInterface
 *
 * @author Gennady Knyazkin <dev@gennadyx.tech>
 */
interface OfferGroupAwareInterface
{
    /**
     * Get groupId
     *
     * @return int
     */
    public function getGroupId();

    /**
     * Set groupId
     *
     * @param int $groupId
     *
     * @return $this
     */
    public function setGroupId($groupId);
}
