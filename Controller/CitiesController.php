<?php

namespace WXR\GeoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use WXR\GeoBundle\Model\CountryVO;

class CitiesController extends Controller
{
    public function listAction()
    {
        $request = $this->getRequest();
        $format = $request->get('_format');

        $cities = $this->getCityManager()->findAll();

        $serializer = $this->get('serializer');
        $data = $serializer->serialize($cities, $format);
        return new Response($data);
    }

    /**
     * @return WXR\GeoBundle\Model\CityManagerInterface
     */
    protected function getCityManager()
    {
        return $this->get('wxr_geo.city.manager');
    }
}
