<?php

namespace WXR\GeoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

use WXR\GeoBundle\Model\City as BaseCity;
use WXR\GeoBundle\Model\AddressInterface;

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
        $this->addresses = new ArrayCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function addAddress(AddressInterface $address)
    {
        if (!$this->hasAddress($address)) {
            $address->setCity($this);
            $this->addresses->add($address);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removeAddress(AddressInterface $address)
    {
        if ($this->hasAddress($address)) {
            $address->setCity(null);
            $this->addresses->removeElement($address);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function clearAddresses()
    {
        foreach ($this->addresses as $address) {
            $address->setCity(null);
        }

        $this->addresses = new ArrayCollection();

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * {@inheritdoc}
     */
    public function hasAddress(AddressInterface $address)
    {
        return $this->addresses->contains($address);
    }
}
