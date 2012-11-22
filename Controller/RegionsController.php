<?php

namespace WXR\GeoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use WXR\GeoBundle\Model\CountryVO;

class RegionsController extends Controller
{
    public function listAction()
    {
        $request = $this->getRequest();
        $format = $request->get('_format');

        $regions = $this->getRegionManager()->findAll();

        $serializer = $this->get('serializer');
        $data = $serializer->serialize($regions, $format);
        return new Response($data);
    }

    /**
     * @return WXR\GeoBundle\Model\RegionManagerInterface
     */
    protected function getRegionManager()
    {
        return $this->get('wxr_geo.region.manager');
    }
}
