<?php

namespace WXR\GeoBundle\Form\Handler;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

use WXR\GeoBundle\Model\CityInterface;
use WXR\GeoBundle\Model\LocationManagerInterface;

class CityHandler
{
    protected $request;

    protected $form;

    protected $cityManager;

    public function __construct(Request $request, FormInterface $form, LocationManagerInterface $cityManager)
    {
        $this->request = $request;
        $this->form = $form;
        $this->cityManager = $cityManager;
    }

    public function getForm()
    {
        return $this->form;
    }

    public function process(CityInterface $city)
    {
        $this->form->setData($city);

        if ('POST' === $this->request->getMethod()) {
            $this->form->bindRequest($this->request);

            if ($this->form->isValid()) {
                $this->onSuccess($city);

                return true;
            }
        }

        return false;
    }

    protected function onSuccess(CityInterface $city)
    {
        $this->cityManager->persist($city);
    }
}
