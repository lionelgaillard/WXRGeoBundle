<?php

namespace WXR\GeoBundle\Model;

/**
 * WXR\GeoBundle\Model\Place
 *
 * @author Lionel Gaillard <lionel.gaillard@wxrstudios.com>
 */
abstract class Place implements PlaceInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var float
     */
    protected $latitude;

    /**
     * @var float
     */
    protected $longitude;

    /**
     * @var AddressInterface|null
     */
    protected $address;


    /**
     * Constructor
     */
    public function __construct(AddressInterface $address = null)
    {
        $this->address = $address ? $address : new Address();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
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
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }
    
    /**
     * {@inheritDoc}
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * {@inheritDoc}
     */
    public function setLatitude($latitude)
    {
        if (!$this->address) {
            throw new \InvalidArgumentException('An address is required to set latitude');
        }

        $this->address->setLatitude();

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getLatitude()
    {
        if (!$this->address) {
            throw new \InvalidArgumentException('An address is required to get latitude');
        }

        $this->address->getLatitude();

    }

    /**
     * {@inheritDoc}
     */
    public function setLongitude($longitude)
    {
        if (!$this->address) {
            throw new \InvalidArgumentException('An address is required to set longitude');
        }

        $this->address->setLongitude();


        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getLongitude()
    {
        if (!$this->address) {
            throw new \InvalidArgumentException('An address is required to get longitude');
        }

        $this->address->getLongitude();
    }

    /**
     * {@inheritDoc}
     */
    public function setAddress(AddressInterface $address = null)
    {
        $this->address = $address;
    
        return $this;
    }
    
    /**
     * {@inheritDoc}
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * {@inheritDoc}
     */
    public function getAddressId()
    {
        return $this->getAddress() ?
            $this->getAddress()->getId() : null;
    }

    /**
     * {@inheritDoc}
     */
    public function getAddressStreet()
    {
        return $this->getAddress() ?
            $this->getAddress()->getStreet() : '';
    }

    /**
     * {@inheritDoc}
     */
    public function getCity()
    {
        return $this->getAddress() ?
            $this->getAddress()->getCity() : null;
    }

    /**
     * {@inheritDoc}
     */
    public function getCityId()
    {
        return $this->getAddress() ?
            $this->getAddress()->getId() : null;
    }

    /**
     * {@inheritDoc}
     */
    public function getCityPostalCode()
    {
        return $this->getAddress() ?
            $this->getAddress()->getCityPostalCode() : '';
    }

    /**
     * {@inheritDoc}
     */
    public function getCityName()
    {
        return $this->getAddress() ?
            $this->getAddress()->getCityName() : '';
    }

    /**
     * {@inheritDoc}
     */
    public function getRegion()
    {
        return $this->getAddress() ?
            $this->getAddress()->getRegion() : null;
    }

    /**
     * {@inheritDoc}
     */
    public function getRegionId()
    {
        return $this->getAddress() ?
            $this->getAddress()->getRegionId() : null;
    }

    /**
     * {@inheritDoc}
     */
    public function getRegionIso()
    {
        return $this->getAddress() ?
            $this->getAddress()->getRegionIso() : '';
    }

    /**
     * {@inheritDoc}
     */
    public function getRegionAbbreviation()
    {
        return $this->getAddress() ?
            $this->getAddress()->getRegionAbbreviation() : '';
    }

    /**
     * {@inheritDoc}
     */
    public function getRegionName()
    {
        return $this->getAddress() ?
            $this->getAddress()->getRegionName() : '';
    }

    /**
     * {@inheritDoc}
     */
    public function getCountry()
    {
        return $this->getAddress() ?
            $this->getAddress()->getCountry() : null;
    }

    /**
     * {@inheritDoc}
     */
    public function getCountryId()
    {
        return $this->getAddress() ?
            $this->getAddress()->getCountryId() : null;
    }

    /**
     * {@inheritDoc}
     */
    public function getCountryIso()
    {
        return $this->getAddress() ?
            $this->getAddress()->getCountryIso() : '';
    }

    /**
     * {@inheritDoc}
     */
    public function getCountryName()
    {
        return $this->getAddress() ?
            $this->getAddress()->getCountryName() : '';
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {
        return $this->getName() . ($this->getAddress() ? ', ' . $this->getAddress() : '');
    }
}