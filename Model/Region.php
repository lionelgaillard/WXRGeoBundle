<?php

namespace WXR\GeoBundle\Model;

/**
 * WXR\GeoBundle\Model\Region
 *
 * @author Lionel Gaillard <lionel.gaillard@wxrstudios.com>
 */
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
     * @var CityInterface[]
     */
    protected $cities;


    protected function __construct()
    {
        $this->cities = array();
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
    public function getCountryId()
    {
        return $this->getCountry() ?
            $this->getCountry()->getId() : null;
    }

    /**
     * {@inheritdoc}
     */
    public function getCountryIso()
    {
        return $this->getCountry() ?
            $this->getCountry()->getIso() : '';
    }

    /**
     * {@inheritdoc}
     */
    public function getCountryName()
    {
        return $this->getCountry() ?
            $this->getCountry()->getName() : '';
    }

    /**
     * {@inheritdoc}
     */
    public function setCities($cities)
    {
        $this->clearCities();

        foreach ($cities as $city) {
            $this->addCity($city);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addCity(CityInterface $city)
    {
        if (!$this->hasCity($city)) {
            $city->setRegion($this);
            $this->cities[] = $city;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removeCity(CityInterface $city)
    {
        if ($this->hasCity($city)) {
            $key = array_search($city, $this->cities, true);
            $city->setRegion(null);
            unset($this->cities[$key]);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function clearCities()
    {
        foreach ($this->cities as $city) {
            $city->setRegion(null);
        }

        $this->cities = array();

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCities()
    {
        return $this->cities;
    }

    /**
     * {@inheritdoc}
     */
    public function hasCity(CityInterface $city)
    {
        return false !== array_search($city, $this->cities, true);
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return $this->getName() . ($this->getCountry() ? ', ' . $this->getCountry() : '');
    }
}
