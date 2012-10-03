<?php

namespace WXR\GeoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegionType extends AbstractType
{
    protected $class;

    public function __construct($class)
    {
        $this->class = $class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('iso', null, array(
                'label' => 'wxr_geo.region.iso',
                'attr' => array('size' => 5)
            ))
            ->add('abbreviation', null, array(
                'label' => 'wxr_geo.region.abbreviation',
                'attr' => array('size' => 2)
            ))
            ->add('name', null, array(
                'label' => 'wxr_geo.region.name'
            ))
            ->add('country', null, array(
                'required' => false,
                'label' => 'wxr_geo.country.country'
            ))
        ;
    }

    public function getName()
    {
        return 'region';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class
        ));
    }

}
