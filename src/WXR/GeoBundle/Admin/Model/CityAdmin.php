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
                'label' => 'wxr_geo.city.postal_code'
            ))
            ->add('name', null, array(
                'label' => 'wxr_geo.region.name'
            ))
            ->add('region', null, array(
                'required' => false,
                'label' => 'wxr_geo.region.region'
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
