<?php

namespace WXR\GeoBundle\Model;

interface CountryInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param string $iso
     * @return CountryInterface
     */
    public function setIso($iso);

    /**
     * @return string
     */
    public function getIso();

    /**
     * @param string $name
     * @return CountryInterface
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param RegionInterface $region
     * @return CountryInterface
     */
    public function addRegion(RegionInterface $region);

    /**
     * @param RegionInterface $region
     * @return CountryInterface
     */
    public function removeRegion(RegionInterface $region);

    /**
     * @return CountryInterface
     */
    public function clearRegions();

    /**
     * @return RegionInterface[]
     */
    public function getRegions();

    /**
     * @param RegionInterface $region
     * @return boolean
     */
    public function hasRegion(RegionInterface $region);

    /**
     * @return LocationInterface[]
     */
    public function getLocations();

    /**
     * @return string
     */
    public function __toString();
}
