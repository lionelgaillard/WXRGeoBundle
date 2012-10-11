<?php

namespace WXR\GeoBundle\Admin\Entity;

use Sonata\AdminBundle\Validator\ErrorElement;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

use WXR\GeoBundle\Admin\Model\RegionAdmin as BaseRegionAdmin;

class RegionAdmin extends BaseRegionAdmin
{
    public function validate(ErrorElement $errorElement, $object)
    {
        parent::validate($errorElement, $object);

        $errorElement
            ->with('iso')
                ->validate(new UniqueEntity(array('fields' => 'iso' )))
            ->end()
        ;
    }
}
