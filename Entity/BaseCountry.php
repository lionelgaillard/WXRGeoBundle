<?php

namespace WXR\GeoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

use WXR\GeoBundle\Model\Country as AbstractCountry;
use WXR\GeoBundle\Model\RegionInterface;

class BaseCountry extends AbstractCountry
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
            $region->setCountry($this);
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
            $region->setCountry(null);
            $this->regions->removeElement($region);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function clearRegions()
    {
        foreach ($this->regions as $region) {
            $region->setCountry(null);
        }

        $this->regions = new ArrayCollection();

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRegions()
    {
        return $this->regions;
    }

    /**
     * {@inheritdoc}
     */
    public function hasRegion(RegionInterface $region)
    {
        return $this->regions->contains($region);
    }
}