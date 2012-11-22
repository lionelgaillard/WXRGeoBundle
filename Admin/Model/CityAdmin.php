<?php

namespace WXR\GeoBundle\Admin\Model;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CityAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('postalCode', null, array(
                'attr' => array('data-wxr-geo-input' => true)
            ))
            ->add('name', null, array(
                'attr' => array('data-wxr-geo-input' => true)
            ))
            ->add('region', 'sonata_type_model', array(
                'required' => false,
                'attr' => array('data-wxr-geo-input' => true)
            ))
            // Force to text type to avoid Intl issue
            ->add('latitude', 'text', array(
                'required' => false,
                //'precision' => 8,
                'attr' => array('data-wxr-geo-latitude' => true)
            ))
            // Force to text type to avoid Intl issue
            ->add('longitude', 'text', array(
                'required' => false,
                //'precision' => 8,
                'attr' => array('data-wxr-geo-longitude' => true)
            ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('postalCode')
            ->add('name')
            ->add('region')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('postalCode')
            ->addIdentifier('name')
            ->add('region')
        ;
    }

}
