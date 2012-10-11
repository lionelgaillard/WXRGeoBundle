<?php

namespace WXR\GeoBundle\Admin\Entity;

use Sonata\AdminBundle\Validator\ErrorElement;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

use WXR\GeoBundle\Admin\Model\CountryAdmin as BaseCountryAdmin;

class CountryAdmin extends BaseCountryAdmin
{
    public function validate(ErrorElement $errorElement, $object)
    {
        parent::validate($errorElement, $object);

        $errorElement
            ->with('iso')
                ->validate()
            ->end()
        ;
    }
}
