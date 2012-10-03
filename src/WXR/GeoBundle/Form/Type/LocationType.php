<?php

namespace WXR\GeoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

abstract class LocationType extends AbstractType
{
    protected $class;

    public function __construct($class)
    {
        $this->class = $class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array(
                'required' => false,
                'label' => 'wxr_geo.location.name'
            ))
            ->add('street', null, array(
                'required' => false,
                'label' => 'wxr_geo.location.street'
            ))
            ->add('latitude', 'number', array(
                'required' => false,
                'label' => 'wxr_geo.location.latitude',
                'precision' => 6
            ))
            ->add('longitude', 'number', array(
                'required' => false,
                'label' => 'wxr_geo.location.longitude',
                'precision' => 6
            ))
            ->add('region', null, array(
                'required' => false,
                'label' => 'wxr_geo.location.region'
            ))
        ;
    }

    public function getName()
    {
        return 'location';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class
        ));
    }

}
