<?php

namespace WXR\GeoBundle\Admin\Model;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class RegionAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('country', null, array(
                'required' => false,
                'label' => 'wxr_geo.country.country'
            ))
            ->add('iso', null, array(
                'label' => 'wxr_geo.region.iso'
            ))
            ->add('abbreviation', null, array(
                'label' => 'wxr_geo.region.abbreviation'
            ))
            ->add('name', null, array(
                'label' => 'wxr_geo.region.name'
            ))
            ->add('cities', null, array(
                'required' => false,
                'label' => 'wxr_geo.city.cities'
            ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('iso')
            ->add('name')
            ->add('country')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('iso')
            ->add('name')
            ->add('country')
        ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('iso')
                ->assertMinLength(array('limit' => 5))
                ->assertMaxLength(array('limit' => 5))
            ->end()
        ;
    }
}
