<?php

namespace WXR\GeoBundle\Controller;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RegionAdminController extends Controller
{
    public function listAction()
    {
        if (!$this->get('security.context')->isGranted('ROLE_WXR_GEO_REGION_ADMIN')) {
            throw new AccessDeniedHttpException();
        }

        $regions = $this->getRegionManager()->findAll();

        return $this->render('WXRGeoBundle:Region:list.html.twig', compact('regions'));
    }

    public function addAction()
    {
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedHttpException();
        }

        $region = $this->getRegionManager()->create();

        $handler = $this->get('wxr_geo.region.form.handler');
        $form = $handler->getForm();

        if ($handler->process($region)) {
            $this->get('session')->setFlash('success', 'wxr_geo.region.added');

            return $this->redirect($this->generateUrl('wxr_geo_region_list'));
        }

        return $this->render('WXRGeoBundle:Region:add.html.twig', array(
            'region' => $region,
            'form' => $form->createView()
        ));
    }

    public function editAction($id)
    {
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedHttpException();
        }

        $region = $this->getRegionManager()->find($id);

        if (null === $region) {
            throw $this->createNotFoundException('wxr_geo.region.not_found');
        }

        $handler = $this->get('wxr_geo.region.form.handler');
        $form = $handler->getForm();

        if ($handler->process($region)) {
            $this->get('session')->setFlash('success', 'wxr_geo.region.updated');

            return $this->redirect($this->generateUrl('wxr_geo_region_list'));
        }

        return $this->render('WXRGeoBundle:Region:edit.html.twig', array(
            'region' => $region,
            'form' => $form->createView()
        ));
    }

    public function deleteAction($id)
    {
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedHttpException();
        }

        $region = $this->getRegionManager()->find($id);

        if (null === $region) {
            throw $this->createNotFoundException('wxr_geo.region.not_found');
        }

        $this->getRegionManager()->remove($region);
        $this->get('session')->setFlash('success', 'wxr_geo.region.deleted');

        return $this->redirect($this->generateUrl('wxr_geo_region_list'));
    }

    /**
     * @return WXR\GeoBundle\Model\RegionManagerInterface
     */
    protected function getRegionManager()
    {
        return $this->get('wxr_geo.region.manager');
    }
}
