<?php

namespace WXR\GeoBundle\Entity;

use WXR\CommonBundle\Entity\BaseManager;
use WXR\GeoBundle\Model\CityManagerInterface;

/**
 * WXR\GeoBundle\Entity\CityManager
 *
 * @author Lionel Gaillard <lionel.gaillard@wxrstudios.com>
 */
class CityManager extends BaseManager implements CityManagerInterface
{
    /**
     * {@inheritDoc}
     */
    public function findByPostalCode($postalCode)
    {
        return $this->em->getRepository($this->class)->findBy(array('postalCode' => strtoupper($postalCode)));
    }
}
