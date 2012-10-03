<?php

namespace WXR\GeoBundle\Entity;

use WXR\GeoBundle\Model\CityInterface;

class City extends Location implements CityInterface
{
    /**
     * @var string
     */
    protected $postalCode;

    /**
     * {@inheritdoc}
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }
}
