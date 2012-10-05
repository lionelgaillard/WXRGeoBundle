<?php

namespace WXR\GeoBundle\Controller\Admin;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LocationAdminController extends Controller
{
    public function listAction()
    {
        if (!$this->get('security.context')->isGranted('ROLE_WXR_GEO_REGION_ADMIN_LIST')) {
            throw new AccessDeniedHttpException();
        }

        $locations = $this->getLocationManager()->findAll();

        return $this->render('WXRGeoBundle:Location:list.html.twig', compact('locations'));
    }

    public function addAction()
    {
        if (!$this->get('security.context')->isGranted('ROLE_WXR_GEO_REGION_ADMIN_ADD')) {
            throw new AccessDeniedHttpException();
        }

        $location = $this->getLocationManager()->create();

        $handler = $this->get('wxr_geo.location.form.handler');
        $form = $handler->getForm();

        if ($handler->process($location)) {
            $this->get('session')->setFlash('success', 'wxr_geo.location.added');

            return $this->redirect($this->generateUrl('wxr_geo_location_admin_list'));
        }

        return $this->render('WXRGeoBundle:Location:add.html.twig', array(
            'location' => $location,
            'form' => $form->createView()
        ));
    }

    public function editAction($id)
    {
        if (!$this->get('security.context')->isGranted('ROLE_WXR_GEO_REGION_ADMIN_EDIT')) {
            throw new AccessDeniedHttpException();
        }

        $location = $this->getLocationManager()->find($id);

        if (null === $location) {
            throw $this->createNotFoundException('wxr_geo.location.not_found');
        }

        $handler = $this->get('wxr_geo.location.form.handler');
        $form = $handler->getForm();

        if ($handler->process($location)) {
            $this->get('session')->setFlash('success', 'wxr_geo.location.updated');

            return $this->redirect($this->generateUrl('wxr_geo_location_admin_list'));
        }

        return $this->render('WXRGeoBundle:Location:edit.html.twig', array(
            'location' => $location,
            'form' => $form->createView()
        ));
    }

    public function deleteAction($id)
    {
        if (!$this->get('security.context')->isGranted('ROLE_WXR_GEO_REGION_ADMIN_DELETE')) {
            throw new AccessDeniedHttpException();
        }

        $location = $this->getLocationManager()->find($id);

        if (null === $location) {
            throw $this->createNotFoundException('wxr_geo.location.not_found');
        }

        if ($this->getRequest()->query->get('confirm')) {

            $this->getLocationManager()->remove($location);
            $this->get('session')->setFlash('success', 'wxr_geo.location.deleted');

            return $this->redirect($this->generateUrl('wxr_geo_location_admin_list'));
        }

        return $this->render('WXRGeoBundle:LocationAdmin:delete.html.twig', compact('country'));
    }

    /**
     * @return WXR\GeoBundle\Model\LocationManagerInterface
     */
    protected function getLocationManager()
    {
        return $this->get('wxr_geo.location.manager');
    }
}
