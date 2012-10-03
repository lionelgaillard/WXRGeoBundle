<?php

namespace WXR\GeoBundle\Model;

interface CityInterface extends LocationInterface
{
    /**
     * @param string $postalCode
     * @return LocationInterface
     */
    public function setPostalCode($postalCode);

    /**
     * @return string
     */
    public function getPostalCode();
}
