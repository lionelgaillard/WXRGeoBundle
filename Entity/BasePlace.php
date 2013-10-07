<?php

namespace WXR\GeoBundle\Entity;

use WXR\GeoBundle\Model\Place as AbstractPlace;
use WXR\GeoBundle\Model\AddressInterface;

/**
 * WXR\GeoBundle\Entity\Place
 *
 * @author Lionel Gaillard <lionel.gaillard@wxrstudios.com>
 */
class BasePlace extends AbstractPlace
{
    public function __construct(AddressInterface $address = null)
    {
        parent::__construct($address ? $address : new \Application\WXR\GeoBundle\Entity\Address());
    }
}