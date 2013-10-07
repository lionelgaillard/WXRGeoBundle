<?php

namespace WXR\GeoBundle\Model;

/**
 * WXR\GeoBundle\Model\Address
 *
 * @author Lionel Gaillard <lionel.gaillard@wxrstudios.com>
 */
abstract class Address implements AddressInterface
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
     * Constructor
     */
    public function __construct() {}

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
    public function setCity(CityInterface $city = null)
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
    public function getCityId()
    {
        return $this->getCity() ?
            $this->getCity()->getId() : null;
    }

    /**
     * {@inheritDoc}
     */
    public function getCityPostalCode()
    {
        return $this->getCity() ?
            $this->getCity()->getPostalCode() : '';
    }

    /**
     * {@inheritDoc}
     */
    public function getCityName()
    {
        return $this->getCity() ?
            $this->getCity()->getName() : '';
    }

    /**
     * {@inheritDoc}
     */
    public function getRegion()
    {
        return $this->getCity() ?
            $this->getCity()->getRegion() : null;
    }

    /**
     * {@inheritDoc}
     */
    public function getRegionId()
    {
        return $this->getCity() ?
            $this->getCity()->getRegionId() : null;
    }

    /**
     * {@inheritDoc}
     */
    public function getRegionIso()
    {
        return $this->getCity() ?
            $this->getCity()->getRegionIso() : '';
    }

    /**
     * {@inheritDoc}
     */
    public function getRegionAbbreviation()
    {
        return $this->getCity() ?
            $this->getCity()->getRegionAbbreviation() : '';
    }

    /**
     * {@inheritDoc}
     */
    public function getRegionName()
    {
        return $this->getCity() ?
            $this->getCity()->getRegionName() : '';
    }

    /**
     * {@inheritDoc}
     */
    public function getCountry()
    {
        return $this->getCity() ?
            $this->getCity()->getCountry() : null;
    }

    /**
     * {@inheritDoc}
     */
    public function getCountryId()
    {
        return $this->getCity() ?
            $this->getCity()->getCountryId() : null;
    }

    /**
     * {@inheritDoc}
     */
    public function getCountryIso()
    {
        return $this->getCity() ?
            $this->getCity()->getCountryIso() : '';
    }

    /**
     * {@inheritDoc}
     */
    public function getCountryName()
    {
        return $this->getCity() ?
            $this->getCity()->getCountryName() : '';
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {
        return ($this->getStreet() ? $this->getStreet() : '')
             . ($this->getStreet() && $this->getCity() ? ', ' : '')
             . ($this->getCity() ? $this->getCity() : '');
    }
}
