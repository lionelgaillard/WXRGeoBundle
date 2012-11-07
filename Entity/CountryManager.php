<?php

namespace WXR\GeoBundle\Entity;

use WXR\CommonBundle\Entity\BaseManager;
use WXR\GeoBundle\Model\CountryManagerInterface;

/**
 * WXR\GeoBundle\Entity\CountryManager
 *
 * @author Lionel Gaillard <lionel.gaillard@wxrstudios.com>
 */
class CountryManager extends BaseManager implements CountryManagerInterface
{
    /**
     * {@inheritDoc}
     */
    public function findOneByIso($iso)
    {
        return $this->em->getRepository($this->class)->findOneBy(array('iso' => strtoupper($iso)));
    }
}
