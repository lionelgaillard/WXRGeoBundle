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
            ->add('iso')
            ->add('abbreviation')
            ->add('name', null, array(
                'attr' => array('data-wxr-geo-input' => true)
            ))
            ->add('country', 'sonata_type_model', array(
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
            ->add('iso')
            ->add('name')
            ->add('country')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('iso')
            ->addIdentifier('name')
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
