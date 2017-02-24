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
        $currentParameters = $masterRequest->get('_route_parameters', array());
        $menu = $this->getParameter('app_menu');

        return $this->render('menu.html.twig', [
            'menu' => $menu,
            'currentRoute' => $currentRoute,
            'currentParameters' => $currentParameters
        ]);
    }

    /**
     * Action : Change your locale and display content in the right language
     *
     * @param  Request $request
     */
    public function changeLocaleAction(Request $request)
    {

    }
}
