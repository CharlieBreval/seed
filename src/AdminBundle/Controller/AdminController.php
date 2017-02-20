<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Admin controller.
 *
 */
class AdminController extends Controller
{
    public function becomeAdminAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $user->addRole('ROLE_ADMIN');

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        $this->addFlash(
            'success',
            'You are now admin, you have to reconnect in the admin'
        );

        $this->get('security.token_storage')->setToken(null);

        return $this->redirect($this->generateUrl('app_home'));
    }
}
