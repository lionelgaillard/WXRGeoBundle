<?php

namespace WXR\GeoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

use WXR\GeoBundle\Model\City as BaseCity;
use WXR\GeoBundle\Model\LocationInterface;

/**
 * WXR\GeoBundle\Entity\City
 *
 * @author Lionel Gaillard <lionel.gaillard@wxrstudios.com>
 */
class City extends BaseCity
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
            $location->setCity($this);
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
            $location->setCity(null);
            $this->locations->removeElement($location);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function clearLocations()
    {
        foreach ($this->locations as $location) {
            $location->setCity(null);
        }

        $this->locations = new ArrayCollection();

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getLocations()
    {
        return $this->locations;
    }

    /**
     * {@inheritdoc}
     */
    public function hasLocation(LocationInterface $location)
    {
        return $this->locations->contains($location);
    }
}
