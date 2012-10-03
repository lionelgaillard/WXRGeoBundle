<?php

namespace WXR\GeoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

use WXR\GeoBundle\Model\Country as BaseCountry;
use WXR\GeoBundle\Model\RegionInterface;

class Country extends BaseCountry
{
    public function __construct()
    {
        parent::__construct();

        $this->regions = new ArrayCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function addRegion(RegionInterface $region)
    {
        if (!$this->hasRegion($region)) {
            $this->regions->add($region);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removeRegion(RegionInterface $region)
    {
        if ($this->hasRegion($region)) {
            $this->regions->removeElement($region);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function clearRegions()
    {
        $this->regions = new ArrayCollection();

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRegions()
    {
        return $this->regions->toArray();
    }

    /**
     * {@inheritdoc}
     */
    public function hasRegion(RegionInterface $region)
    {
        return $this->regions->contains($region);
    }
}
