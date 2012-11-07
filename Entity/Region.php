<?php

namespace WXR\GeoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

use WXR\GeoBundle\Model\CityInterface;
use WXR\GeoBundle\Model\Region as BaseRegion;

/**
 * WXR\GeoBundle\Entity\Region
 *
 * @author Lionel Gaillard <lionel.gaillard@wxrstudios.com>
 */
class Region extends BaseRegion
{
    public function __construct()
    {
        parent::__construct();
        $this->cities = new ArrayCollection();
    }

    /**
     * {@inheritDoc}
     */
    public function addCity(CityInterface $city)
    {
        if (!$this->hasCity($city)) {
            $city->setRegion($this);
            $this->cities->add($city);
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function removeCity(CityInterface $city)
    {
        if ($this->hasCity($city)) {
            $city->setRegion(null);
            $this->cities->removeElement($city);
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function clearCities()
    {
        foreach ($this->cities as $city) {
            $city->setRegion(null);
        }

        $this->cities = new ArrayCollection();

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCities()
    {
        return $this->cities;
    }

    /**
     * {@inheritDoc}
     */
    public function hasCity(CityInterface $city)
    {
        return $this->cities->contains($city);
    }
}
