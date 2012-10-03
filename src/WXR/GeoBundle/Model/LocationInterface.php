<?php

namespace WXR\GeoBundle\Model;

interface LocationInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param string $name
     * @return LocationInterface
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param float $latitude
     * @return LocationInterface
     */
    public function setLatitude($latitude);

    /**
     * @return float
     */
    public function getLatitude();

    /**
     * @param float $longitude
     * @return LocationInterface
     */
    public function setLongitude($longitude);

    /**
     * @return float
     */
    public function getLongitude();

    /**
     * @param RegionInterface|null $region
     * @return LocationInterface
     */
    public function setRegion(RegionInterface $region = null);

    /**
     * @return RegionInterface|null
     */
    public function getRegion();

    /**
     * @return CountryInterface|null
     */
    public function getCountry();

    /**
     * @return string
     */
    public function __toString();
}
