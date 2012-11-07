<?php

namespace WXR\GeoBundle\Model;

/**
 * WXR\GeoBundle\Model\LocationInterface
 *
 * @author Lionel Gaillard <lionel.gaillard@wxrstudios.com>
 */
interface LocationInterface
{
    /**
     * Get id
     *
     * @return mixed
     */
    public function getId();

    /**
     * Set street
     *
     * @param string $street
     * @return LocationInterface
     */
    public function setStreet($street);

    /**
     * Get street
     *
     * @return string
     */
    public function getStreet();

    /**
     * Set latitude
     *
     * @param float $latitude
     * @return LocationInterface
     */
    public function setLatitude($latitude);

    /**
     * Get latitude
     *
     * @return float
     */
    public function getLatitude();

    /**
     * Set longitude
     *
     * @param float $longitude
     * @return LocationInterface
     */
    public function setLongitude($longitude);

    /**
     * Get longitude
     *
     * @return float
     */
    public function getLongitude();

    /**
     * Set city
     *
     * @param CityInterface|null $city
     * @return LocationInterface
     */
    public function setCity(CityInterface $city = null);

    /**
     * Get city
     *
     * @return CityInterface|null
     */
    public function getCity();

    /**
     * Get city postal code
     *
     * @return string
     */
    public function getCityPostalCode();

    /**
     * Get city name
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
     * @return CityInterface|null
     */
    public function getCountry();

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
