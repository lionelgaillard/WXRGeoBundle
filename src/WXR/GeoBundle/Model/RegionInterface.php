<?php

namespace WXR\GeoBundle\Model;

interface RegionInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param string $iso
     * @return RegionInterface
     */
    public function setIso($iso);

    /**
     * @return string
     */
    public function getIso();

    /**
     * @param string $abbreviation
     * @return RegionInterface
     */
    public function setAbbreviation($abbreviation);

    /**
     * @return string
     */
    public function getAbbreviation();

    /**
     * @param string $name
     * @return RegionInterface
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param CountryInterface $country
     * @return RegionInterface
     */
    public function setCountry(CountryInterface $country = null);

    /**
     * @return CountryInterface|null
     */
    public function getCountry();

    /**
     * @param LocationInterface $location
     * @return RegionInterface
     */
    public function addLocation(LocationInterface $location);

    /**
     * @param LocationInterface $location
     * @return RegionInterface
     */
    public function removeLocation(LocationInterface $location);

    /**
     * @return RegionInterface
     */
    public function clearLocations();

    /**
     * @return LocationInterface[]
     */
    public function getLocations();

    /**
     * @param LocationInterface $location
     * @return boolean
     */
    public function hasLocation(LocationInterface $location);

    /**
     * @return string
     */
    public function __toString();
}
