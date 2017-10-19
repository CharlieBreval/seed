<?php

namespace AppBundle\Controller;

use AdminBundle\Repository\PaintingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GalleryController extends Controller
{
    /**
     * Action : List all paintings
     *
     * @return Response
     */
    public function indexAction($page)
    {
        $paintings = $this->getDoctrine()->getRepository('AdminBundle:Painting')->getPaintings($page);
        $countPaintings = $this->getDoctrine()->getRepository('AdminBundle:Painting')->getPaintings($page, true);
        $nbElementsPerPage = PaintingRepository::NB_ELEM_PAGE;
        $nbPages = ceil($countPaintings / $nbElementsPerPage);

        return $this->render('AppBundle:Gallery:index.html.twig', [
            'paintings' => $paintings,
            'nbPages' => $nbPages,
            'page' => $page
        ]);
    }
}
