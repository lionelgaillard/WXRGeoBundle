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
     * @var float
     */
    protected $latitude;

    /**
     * @var float
     */
    protected $longitude;

    /**
     * @var RegionInterface|null
     */
    protected $region;

    /**
     * @var AddressInterface[]
     */
    protected $addresses;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->addresses = array();
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
    public function getRegionId()
    {
        return $this->getRegion() ?
            $this->getRegion()->getId() : null;
    }

    /**
     * {@inheritDoc}
     */
    public function getRegionIso()
    {
        return $this->getRegion() ?
            $this->getRegion()->getIso() : '';
    }

    /**
     * {@inheritDoc}
     */
    public function getRegionAbbreviation()
    {
        return $this->getRegion() ?
            $this->getRegion()->getAbbreviation() : '';
    }

    /**
     * {@inheritDoc}
     */
    public function getRegionName()
    {
        return $this->getRegion() ?
            $this->getRegion()->getName() : '';
    }

    /**
     * {@inheritDoc}
     */
    public function getCountry()
    {
        return $this->getRegion() ?
            $this->getRegion()->getCountry() : null;
    }

    /**
     * {@inheritDoc}
     */
    public function getCountryId()
    {
        return $this->getRegion() ?
            $this->getRegion()->getCountryId() : null;
    }

    /**
     * {@inheritDoc}
     */
    public function getCountryIso()
    {
        return $this->getRegion() ?
            $this->getRegion()->getCountryIso() : '';
    }

    /**
     * {@inheritDoc}
     */
    public function getCountryName()
    {
        return $this->getRegion() ?
            $this->getRegion()->getCountryName() : '';
    }

    /**
     * {@inheritDoc}
     */
    public function setAddresses($addresses)
    {
        $this->clearAddresses();

        foreach ($addresses as $address) {
            $this->addCity($address);
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function addCity(CityInterface $address)
    {
        if (!$this->hasCity($address)) {
            $address->setCity($this);
            $this->addresses[] = $address;
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function removeCity(CityInterface $address)
    {
        if ($this->hasCity($address)) {
            $key = array_search($address, $this->addresses, true);
            $address->setCity(null);
            unset($this->addresses[$key]);
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function clearAddresses()
    {
        foreach ($this->addresses as $address) {
            $address->setCity(null);
        }

        $this->addresses = array();

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * {@inheritDoc}
     */
    public function hasCity(CityInterface $address)
    {
        return array_search($address, $this->addresses, true) !== false;
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {
        return ($this->getPostalCode() ? $this->getPostalCode() . ' ' : '')
             . $this->getName()
             . ($this->getRegion() ? ', ' . $this->getRegion() : '');
    }
}
