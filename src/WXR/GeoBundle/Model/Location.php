<?php

namespace WXR\GeoBundle\Model;

/**
 * WXR\GeoBundle\Model\Location
 *
 * @author Lionel Gaillard <lionel.gaillard@wxrstudios.com>
 */
abstract class Location implements LocationInterface
{
    /**
     * @var mixed
     */
    protected $id;

    /**
     * @var string
     */
    protected $street;

    /**
     * @var float
     */
    protected $latitude;

    /**
     * @var float
     */
    protected $longitude;

    /**
     * @var CityInterface|null
     */
    protected $city;

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
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * {@inheritDoc}
     */
    public function setLatitude($latitude)
    {
        $this->latitude = (float) $latitude;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * {@inheritDoc}
     */
    public function setLongitude($longitude)
    {
        $this->longitude = (float) $longitude;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * {@inheritDoc}
     */
    public function setCity(CountryInterface $city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * {@inheritDoc}
     */
    public function getRegion()
    {
        return $this->getCity() ? $this->getCity()->getRegion() : null;
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
    public function __toString()
    {
        return ($this->getStreet() ? $this->getStreet() : '')
             . ($this->getStreet() || $this->getCity() ? ', ' : '')
             . ($this->getCity() ? $this->getCity() : '');
    }
}
