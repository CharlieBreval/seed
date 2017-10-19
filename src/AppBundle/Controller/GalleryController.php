<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GalleryController extends Controller
{
    /**
     * Action : List all paintings
     *
     * @return Response
     */
    public function indexAction()
    {
        $paintings = $this->getDoctrine()->getRepository('AdminBundle:Painting')->findBy([
            'isDisabled' => false
        ], [
            'createdAt' => 'DESC'
        ]);

        return $this->render('AppBundle:Gallery:index.html.twig', [
            'paintings' => $paintings
        ]);
    }
}
