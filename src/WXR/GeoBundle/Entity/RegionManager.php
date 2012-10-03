<?php

namespace WXR\GeoBundle\Entity;

use WXR\CommonBundle\Entity\BaseManager;
use WXR\GeoBundle\Model\RegionManagerInterface;

/**
 * WXR\GeoBundle\Entity\RegionManager
 *
 * @author Lionel Gaillard <lionel.gaillard@wxrstudios.com>
 */
class RegionManager extends BaseManager implements RegionManagerInterface
{
    /**
     * {@inheritDoc}
     */
    public function findOneByIso($iso)
    {
        return $this->em->getRepository($this->class)->findOneBy(array('iso' => strtoupper($iso)));
    }
}
