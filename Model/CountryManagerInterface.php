<?php

namespace WXR\GeoBundle\Model;

use WXR\CommonBundle\Model\BaseManagerInterface;

/**
 * WXR\GeoBundle\Model\CountryManagerInterface
 *
 * @author Lionel Gaillard <lionel.gaillard@wxrstudios.com>
 */
interface CountryManagerInterface extends BaseManagerInterface
{
    /**
     * Find one by ISO
     *
     * @param string $iso
     * @return CountryInterface|null
     */
    public function findOneByIso($iso);
}
