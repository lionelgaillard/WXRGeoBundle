<?php

namespace WXR\GeoBundle\Form\Handler;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

use WXR\GeoBundle\Model\CountryInterface;
use WXR\GeoBundle\Model\CountryManagerInterface;

class CountryHandler
{
    protected $request;

    protected $form;

    protected $countryManager;

    public function __construct(Request $request, FormInterface $form, CountryManagerInterface $countryManager)
    {
        $this->request = $request;
        $this->form = $form;
        $this->countryManager = $countryManager;
    }

    public function getForm()
    {
        return $this->form;
    }

    public function process(CountryInterface $country)
    {
        $this->form->setData($country);

        if ('POST' === $this->request->getMethod()) {
            $this->form->bindRequest($this->request);

            if ($this->form->isValid()) {
                $this->onSuccess($country);

                return true;
            }
        }

        return false;
    }

    protected function onSuccess(CountryInterface $country)
    {
        $this->countryManager->persist($country);
    }
}
