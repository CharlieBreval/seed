<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class VideoController extends Controller
{
    /**
     * Action : List all videos
     *
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function indexAction(Request $request)
    {
        return $this->render('AppBundle:Video:index.html.twig', []);
    }
}
