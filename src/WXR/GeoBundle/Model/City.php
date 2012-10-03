<?php

namespace WXR\GeoBundle\Model;

/**
 * WXR\GeoBundle\Model\City
 *
 * @author Lionel Gaillard <lionel.gaillard@wxrstudios.com>
 */
abstract class City implements CityInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $postalCode;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var RegionInterface|null
     */
    protected $region;

    /**
     * @var LocationInterface[]
     */
    protected $locations;


    public function __construct()
    {
        $this->locations = array();
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * {@inheritDoc}
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function setRegion(RegionInterface $region = null)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * {@inheritDoc}
     */
    public function getCountry()
    {
        return $this->getRegion() ? $this->getRegion()->getCountry() : null;
    }

    /**
     * {@inheritDoc}
     */
    public function setLocations($locations)
    {
        $this->clearLocations();

        foreach ($locations as $location) {
            $this->addCity($location);
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function addCity(CityInterface $location)
    {
        if (!$this->hasCity($location)) {
            $location->setCity($this);
            $this->locations[] = $location;
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function removeCity(CityInterface $location)
    {
        if ($this->hasCity($location)) {
            $key = array_search($location, $this->locations, true);
            $location->setCity(null);
            unset($this->locations[$key]);
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function clearLocations()
    {
        foreach ($this->locations as $location) {
            $location->setCity(null);
        }

        $this->locations = array();

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getLocations()
    {
        return $this->locations;
    }

    /**
     * {@inheritDoc}
     */
    public function hasCity(CityInterface $location)
    {
        return array_search($location, $this->locations, true) !== false;
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {
        return $this->name;
    }
}
