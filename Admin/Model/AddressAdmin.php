<?php

namespace WXR\GeoBundle\Admin\Model;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

abstract class AddressAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('street', null, array(
                'required' => false,
                'attr' => array('data-wxr-geo-input' => true)
            ))
            ->add('city', 'sonata_type_model', array(
                'required' => false,
                'attr' => array('data-wxr-geo-input' => true)
            ))
            // Force to text type to avoid Intl issue
            ->add('latitude', null, array(
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
