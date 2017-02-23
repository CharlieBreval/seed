<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MenuController extends Controller
{
    /**
     * Action : To display the menu
     *
     * @param  Request $request
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $stack = $this->get('request_stack');
        $masterRequest = $stack->getMasterRequest();
        $currentRoute = $masterRequest->get('_route');

        $menu = $this->getParameter('app_menu');

        return $this->render('menu.html.twig', [
            'menu' => $menu,
            'currentRoute' => $currentRoute
        ]);
    }
}
