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
     * @param CountryInterface|null $city
     * @return LocationInterface
     */
    public function setCity(CountryInterface $city = null);

    /**
     * Get city
     *
     * @return CountryInterface|null
     */
    public function getCity();

    /**
     * Get region
     *
     * @return RegionInterface|null
     */
    public function getRegion();

    /**
     * Get country
     *
     * @return CountryInterface|null
     */
    public function getCountry();

    /**
     * @return string
     */
    public function __toString();
}
