<?php

namespace WXR\GeoBundle\Form\Handler;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

use WXR\GeoBundle\Model\LocationInterface;
use WXR\GeoBundle\Model\LocationManagerInterface;

class LocationHandler
{
    protected $request;

    protected $form;

    protected $locationManager;

    public function __construct(Request $request, FormInterface $form, LocationManagerInterface $locationManager)
    {
        $this->request = $request;
        $this->form = $form;
        $this->locationManager = $locationManager;
    }

    public function getForm()
    {
        return $this->form;
    }

    public function process(LocationInterface $location)
    {
        $this->form->setData($location);

        if ('POST' === $this->request->getMethod()) {
            $this->form->bindRequest($this->request);

            if ($this->form->isValid()) {
                $this->onSuccess($location);

                return true;
            }
        }

        return false;
    }

    protected function onSuccess(LocationInterface $location)
    {
        $this->locationManager->persist($location);
    }
}
