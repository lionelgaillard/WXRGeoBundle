<?php

namespace WXR\GeoBundle\Model;

/**
 * WXR\GeoBundle\Model\PlaceInterface
 *
 * @author Lionel Gaillard <lionel.gaillard@wxrstudios.com>
 */
interface PlaceInterface extends GeolocalisableInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();

    /**
     * Set name
     *
     * @param string $name
     * @return PlaceInterface
     */
    public function setName($name);

    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Set description
     *
     * @param string $description
     * @return PlaceInterface
     */
    public function setDescription($description);

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();

    /**
     * Set address
     *
     * @param AddressInterface $address
     * @return PlaceInterface
     */
    public function setAddress(AddressInterface $address = null);

    /**
     * Get address
     *
     * @return AddressInterface|null
     */
    public function getAddress();

    /**
     * Get addressId
     *
     * @return integer|null
     */
    public function getAddressId();

    /**
     * Get addressStreet
     *
     * @return string
     */
    public function getAddressStreet();

    /**
     * Get city
     *
     * @return CityInterface|null
     */
    public function getCity();

    /**
     * Get cityId
     *
     * @return integer|null
     */
    public function getCityId();

    /**
     * Get cityPostalCode
     *
     * @return string
     */
    public function getCityPostalCode();

    /**
     * Get cityName
     *
     * @return string
     */
    public function getCityName();

    /**
     * Get region
     *
     * @return RegionInterface|null
     */
    public function getRegion();

    /**
     * Get regionId
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
     * @return string
     */
    public function __toString();
}