<?php

namespace WXR\GeoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class PlacesController extends Controller
{
    public function listAction()
    {
        $request = $this->getRequest();
        $format = $request->get('_format');

        $places = $this->getPlaceManager()->findAll();

        $serializer = $this->get('serializer');
        $data = $serializer->serialize($places, $format);
        return new Response($data);
    }

    /**
     * @return WXR\GeoBundle\Model\PlaceManagerInterface
     */
    protected function getPlaceManager()
    {
        return $this->get('wxr_geo.place.manager');
    }
}
