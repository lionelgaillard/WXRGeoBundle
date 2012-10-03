<?php

namespace WXR\GeoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CountryType extends AbstractType
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
                'label' => 'wxr_geo.country.iso',
                'attr' => array('size' => 2)
            ))
            ->add('name', null, array(
                'label' => 'wxr_geo.country.name'
            ))
        ;
    }

    public function getName()
    {
        return 'country';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
            'intention'  => 'profile',
        ));
    }

}
