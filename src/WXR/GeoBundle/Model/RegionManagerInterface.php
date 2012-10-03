<?php

namespace WXR\GeoBundle\Model;

use WXR\CommonBundle\Model\BaseManagerInterface;

/**
 * WXR\GeoBundle\Model\RegionManagerInterface
 *
 * @author Lionel Gaillard <lionel.gaillard@wxrstudios.com>
 */
interface RegionManagerInterface extends BaseManagerInterface
{
    /**
     * Find one by ISO
     *
     * @param string $iso
     * @return RegionInterface|null
     */
    public function findOneByIso($iso);
}
