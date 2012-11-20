<?php

namespace WXR\GeoBundle\Admin\Model;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class AddressAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('street', null, array(
                'required' => false,
                'attr' => array('class' => 'span5 wxr-geo-address-street')
            ))
            ->add('city', 'sonata_type_model', array(
                'required' => false,
                'attr' => array('class' => 'span5 wxr-geo-address-city')
            ))

            // Force to text type to avoid Intl issue
            ->add('latitude', 'text', array(
                'required' => false,
                //'precision' => 8,
                'attr' => array('class' => 'input-small wxr-geo-address-latitude')
            ))
            // Force to text type to avoid Intl issue
            ->add('longitude', 'text', array(
                'required' => false,
                //'precision' => 8,
                'attr' => array('class' => 'input-small wxr-geo-address-longitude')
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
