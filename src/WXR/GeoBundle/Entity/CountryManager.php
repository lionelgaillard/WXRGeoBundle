<?php

namespace WXR\GeoBundle\Entity;

use WXR\CommonBundle\Entity\BaseManager;
use WXR\GeoBundle\Model\CountryManagerInterface;

class CountryManager extends BaseManager implements CountryManagerInterface
{
    /**
     * {@inheritdoc}
     */
    public function findOneByIso($iso)
    {
        return $this->em->getRepository($this->class)->findOneBy(array('iso' => strtoupper($iso)));
    }
}
