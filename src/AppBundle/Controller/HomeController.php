<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    /**
     * Action : Display the home
     *
     * @param  Request $request
     * @return Response
     */
    public function indexAction(Request $request)
    {
        return $this->render('AppBundle:Home:index.html.twig', []);
    }
}
