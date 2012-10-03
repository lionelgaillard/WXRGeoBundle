<?php

namespace WXR\GeoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

use WXR\GeoBundle\Model\LocationInterface;
use WXR\GeoBundle\Model\Region as BaseRegion;

class Region extends BaseRegion
{
    public function __construct()
    {
        parent::__construct();

        $this->locations = new ArrayCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function addLocation(LocationInterface $location)
    {
        if (!$this->hasLocation($location)) {
            $this->locations->add($location);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removeLocation(LocationInterface $location)
    {
        if ($this->hasLocation($location)) {
            $this->locations->removeElement($location);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function clearLocations()
    {
        $this->locations = new ArrayCollection();

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getLocations()
    {
        return $this->locations->toArray();
    }

    /**
     * {@inheritdoc}
     */
    public function hasLocation(LocationInterface $location)
    {
        return $this->locations->contains($location);
    }
}
