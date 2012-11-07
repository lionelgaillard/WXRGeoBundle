<?php

namespace WXR\GeoBundle\Admin\Model;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class LocationAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('street', null, array(
                'attr' => array('class' => 'span5 wxr-geo-location-street')
            ))
            ->add('city', null, array(
                'required' => false,
                'attr' => array('class' => 'span5 wxr-geo-location-city')
            ))
            // Force to text type to avoid Intl issue
            ->add('latitude', 'text', array(
                'required' => false,
                //'precision' => 8,
                'attr' => array('class' => 'input-small wxr-geo-location-latitude')
            ))
            // Force to text type to avoid Intl issue
            ->add('longitude', 'text', array(
                'required' => false,
                //'precision' => 8,
                'attr' => array('class' => 'input-small wxr-geo-location-longitude')
            ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('street')
            ->add('city')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('street')
            ->add('city')
        ;
    }

}
