<?php

namespace WXR\GeoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CityType extends AbstractType
{
    protected $class;

    public function __construct($class)
    {
        $this->class = $class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('postalCode', null, array(
                'label' => 'wxr_geo.city.postal_code'
            ))
            ->add('name', null, array(
                'label' => 'wxr_geo.city.name'
            ))
            ->add('region', null, array(
                'required' => false,
                'label' => 'wxr_geo.region.region'
            ))
        ;

        parent::buildForm($builder, $options);
    }

    public function getName()
    {
        return 'city';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class
        ));
    }

}
