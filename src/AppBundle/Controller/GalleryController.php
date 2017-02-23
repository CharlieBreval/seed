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
        $results = $this->getDoctrine()->getRepository('AdminBundle:Painting')->findAll();
        $sections = [];

        foreach ($results as $key => $painting) {
            $sections[$painting->getCreatedAt()->format('Y')][] = $painting;
        }

        return $this->render('AppBundle:Gallery:index.html.twig', [
            'sections' => $sections
        ]);
    }
}
