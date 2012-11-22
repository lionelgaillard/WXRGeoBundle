<?php

namespace WXR\GeoBundle\Model;

/**
 * WXR\GeoBundle\Model\RegionInterface
 *
 * @author Lionel Gaillard <lionel.gaillard@wxrstudios.com>
 */
interface RegionInterface extends GeolocalisableInterface
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
     * Set cities
     *
     * @param array|\Traversable
     * @return RegionInterface
     */
    public function setCities($cities);

    /**
     * @param CityInterface $city
     * @return RegionInterface
     */
    public function addCity(CityInterface $city);

    /**
     * @param CityInterface $city
     * @return RegionInterface
     */
    public function removeCity(CityInterface $city);

    /**
     * @return RegionInterface
     */
    public function clearCities();

    /**
     * @return CityInterface[]
     */
    public function getCities();

    /**
     * @param CityInterface $city
     * @return boolean
     */
    public function hasCity(CityInterface $city);

    /**
     * @return string
     */
    public function __toString();
}
