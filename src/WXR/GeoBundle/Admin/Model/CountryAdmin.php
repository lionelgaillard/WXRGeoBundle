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
            ->add('iso', 'text', array(
                'label' => 'wxr_geo.country.iso'
            ))
            ->add('name', 'text', array(
                'label' => 'wxr_geo.country.name'
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
