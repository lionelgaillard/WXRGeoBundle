<?php

namespace WXR\GeoBundle\Model;

/**
 * WXR\GeoBundle\Model\CityInterface
 *
 * @author Lionel Gaillard <lionel.gaillard@wxrstudios.com>
 */
interface CityInterface extends GeolocalisableInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();

    /**
     * Set postal code
     *
     * @param string $postalCode
     * @return CityInterface
     */
    public function setPostalCode($postalCode);

    /**
     * Get postal code
     *
     * @return string
     */
    public function getPostalCode();

    /**
     * Set name
     *
     * @param string $name
     * @return CityInterface
     */
    public function setName($name);

    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Set region
     *
     * @param RegionInterface $region
     * @return CityInterface
     */
    public function setRegion(RegionInterface $region = null);

    /**
     * Get region
     *
     * @return RegionInterface|null
     */
    public function getRegion();

    /**
     * Get region id
     *
     * @return integer|null
     */
    public function getRegionId();

    /**
     * Get region ISO
     *
     * @return string
     */
    public function getRegionIso();

    /**
     * Get region abbreviation
     *
     * @return string
     */
    public function getRegionAbbreviation();

    /**
     * Get region name
     *
     * @return string
     */
    public function getRegionName();

    /**
     * Get country
     *
     * @return CountryInterface|null
     */
    public function getCountry();

    /**
     * Get country id
     *
     * @return integer|null
     */
    public function getCountryId();

    /**
     * Get country ISO
     *
     * @return string
     */
    public function getCountryIso();

    /**
     * Get country name
     *
     * @return string
     */
    public function getCountryName();

    /**
     * Set addresses
     *
     * @param AddressInterface[] $addresses
     * @return CityInterface
     */
    public function setAddresses($addresses);

    /**
     * Add address
     *
     * @param AddressInterface $address
     * @return CityInterface
     */
    public function addAddress(AddressInterface $address);

    /**
     * Remove address
     *
     * @param AddressInterface $address
     * @return CityInterface
     */
    public function removeAddress(AddressInterface $address);

    /**
     * Get addresses
     *
     * @return AddressInterface[]
     */
    public function getAddresses();

    /**
     * Has address
     *
     * @param AddressInterface $address
     * @return boolean
     */
    public function hasAddress(AddressInterface $address);

    /**
     * @return string
     */
    public function __toString();
}
