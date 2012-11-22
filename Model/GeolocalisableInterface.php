<?php

namespace WXR\GeoBundle\Model;

interface GeolocalisableInterface
{
    /**
     * Set latitude
     *
     * @param float $latitude
     * @return AddressInterface
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
     * @return AddressInterface
     */
    public function setLongitude($longitude);

    /**
     * Get longitude
     *
     * @return float
     */
    public function getLongitude();

}