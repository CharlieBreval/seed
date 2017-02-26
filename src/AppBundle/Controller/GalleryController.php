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
        $results = $this->getDoctrine()->getRepository('AdminBundle:Painting')->findBy([], [
            'createdAt' => 'DESC'
        ]);
        $sections = [];

        foreach ($results as $key => $painting) {
            $category = $painting->getCreatedAt()->format('Y');
            if ($category >= 2015) {
                $sections[$category]['name'] = $painting->getCreatedAt()->format('Y');
                $sections[$category]['paintings'][] = $painting;
            }
        }

        return $this->render('AppBundle:Gallery:index.html.twig', [
            'sections' => $sections
        ]);
    }
}
