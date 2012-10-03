<?php

namespace WXR\GeoBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;

use WXR\GeoBundle\Form\Type\LocationType;

class CityType extends LocationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('postalCode', null, array(
                'label' => 'wxr_geo.city.postal_code'
            ))
        ;

        parent::buildForm($builder, $options);
    }

    public function getName()
    {
        return 'city';
    }

}
