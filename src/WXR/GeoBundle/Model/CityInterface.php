<?php

namespace WXR\GeoBundle\Model;

/**
 * WXR\GeoBundle\Model\CityInterface
 *
 * @author Lionel Gaillard <lionel.gaillard@wxrstudios.com>
 */
interface CityInterface
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
     * Get country
     *
     * @return CountryInterface|null
     */
    public function getCountry();

    /**
     * Set locations
     *
     * @param LocationInterface[] $locations
     * @return CityInterface
     */
    public function setLocations($locations);

    /**
     * Add location
     *
     * @param LocationInterface $location
     * @return CityInterface
     */
    public function addLocation(LocationInterface $location);

    /**
     * Remove location
     *
     * @param LocationInterface $location
     * @return CityInterface
     */
    public function removeLocation(LocationInterface $location);

    /**
     * Get locations
     *
     * @return LocationInterface[]
     */
    public function getLocations();

    /**
     * Has location
     *
     * @param LocationInterface $location
     * @return boolean
     */
    public function hasLocation(LocationInterface $location);

    /**
     * @return string
     */
    public function __toString();
}
