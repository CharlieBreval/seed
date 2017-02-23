<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AboutController extends Controller
{
    /**
     * Action : Display the about page
     *
     * @return Response
     */
    public function indexAction()
    {
        return $this->render('AppBundle:About:index.html.twig', []);
    }
}
