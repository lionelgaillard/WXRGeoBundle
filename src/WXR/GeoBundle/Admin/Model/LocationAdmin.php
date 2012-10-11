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
            ->add('city', null, array(
                'required' => false,
                'label' => 'wxr_geo.city.city'
            ))
            ->add('street', null, array(
                'label' => 'wxr_geo.location.street'
            ))
            ->add('latitude', null, array(
                'required' => false,
                'label' => 'wxr_geo.location.latitude'
            ))
            ->add('longitude', null, array(
                'required' => false,
                'label' => 'wxr_geo.location.longitude'
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
            ->add('street')
            ->add('city')
        ;
    }

}
