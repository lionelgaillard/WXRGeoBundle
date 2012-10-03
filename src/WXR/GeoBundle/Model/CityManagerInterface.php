<?php

namespace WXR\GeoBundle\Model;

use WXR\CommonBundle\Model\BaseManagerInterface;

/**
 * WXR\GeoBundle\Model\CityManagerInterface
 *
 * @author Lionel Gaillard <lionel.gaillard@wxrstudios.com>
 */
interface CityManagerInterface extends BaseManagerInterface
{
    /**
     * Find by postal code
     *
     * @param string $postalCode
     * @return CityInterface[]
     */
    public function findByPostalCode($postalCode);
}
