<?php

namespace WXR\GeoBundle\Model;

abstract class Region implements RegionInterface
{
    /**
     * @var mixed
     */
    protected $id;

    /**
     * @var string
     */
    protected $iso;

    /**
     * @var string
     */
    protected $abbreviation;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var CountryInterface
     */
    protected $country;

    /**
     * @var array
     */
    protected $locations;

    protected function __construct()
    {
        $this->locations = array();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function setIso($iso)
    {
        $this->iso = strtoupper($iso);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getIso()
    {
        return $this->iso;
    }

    /**
     * {@inheritdoc}
     */
    public function setAbbreviation($abbreviation)
    {
        $this->abbreviation = strtoupper($abbreviation);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getAbbreviation()
    {
        return $this->abbreviation;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setCountry(CountryInterface $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * {@inheritdoc}
     */
    public function addLocation(LocationInterface $location)
    {
        if (!$this->hasLocation($location)) {
            $this->locations[] = $location;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removeLocation(LocationInterface $location)
    {
        if ($this->hasLocation($location)) {
            $key = array_search($location, $this->locations, true);
            unset($this->locations[$key]);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function clearLocations()
    {
        $this->locations = array();

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
        return array_search($location, $this->locations, true) !== false;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return $this->name;
    }
}
