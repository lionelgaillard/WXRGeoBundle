<?php

namespace WXR\GeoBundle\Form\Handler;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

use WXR\GeoBundle\Model\RegionInterface;
use WXR\GeoBundle\Model\RegionManagerInterface;

class RegionHandler
{
    protected $request;

    protected $form;

    protected $regionManager;

    public function __construct(Request $request, FormInterface $form, RegionManagerInterface $regionManager)
    {
        $this->request = $request;
        $this->form = $form;
        $this->regionManager = $regionManager;
    }

    public function getForm()
    {
        return $this->form;
    }

    public function process(RegionInterface $region)
    {
        $this->form->setData($region);

        if ('POST' === $this->request->getMethod()) {
            $this->form->bindRequest($this->request);

            if ($this->form->isValid()) {
                $this->onSuccess($region);

                return true;
            }
        }

        return false;
    }

    protected function onSuccess(RegionInterface $region)
    {
        $this->regionManager->persist($region);
    }
}
