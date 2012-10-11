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
            ->add('region', null, array(
                'required' => false,
                'label' => 'wxr_geo.region.region'
            ))
            ->add('postalCode', null, array(
                'label' => 'wxr_geo.city.postalCode'
            ))
            ->add('name', null, array(
                'label' => 'wxr_geo.region.name'
            ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('postalCode')
            ->add('name')
            ->add('country')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('postalCode')
            ->add('name')
            ->add('country')
        ;
    }

}
