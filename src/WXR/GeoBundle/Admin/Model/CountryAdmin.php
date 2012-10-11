<?php

namespace WXR\GeoBundle\Admin\Model;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class CountryAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('iso', null, array(
                'label' => 'wxr_geo.country.iso'
            ))
            ->add('name', null, array(
                'label' => 'wxr_geo.country.name'
            ))
            ->add('regions', null, array(
                'required' => false,
                'label' => 'wxr_geo.region.regions'
            ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('iso')
            ->add('name')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('iso')
            ->add('name')
        ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('iso')
                ->assertMinLength(array('limit' => 2))
                ->assertMaxLength(array('limit' => 2))
            ->end()
        ;
    }
}
