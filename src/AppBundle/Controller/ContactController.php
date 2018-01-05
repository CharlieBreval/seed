<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
    /**
     * Display the contact form
     *
     * @param  Request $request
     * @return Response           [description]
     */
    public function indexAction(Request $request)
    {
        if ($request->getMethod() === 'POST') {
            define("WEBMASTER_EMAIL", $request->request->get('sendto'));
            define("EMAIL_SUBJECT", $request->request->get('subject'));

            if (EMAIL_SUBJECT == '' || EMAIL_SUBJECT == 'Subject') {
                define("EMAIL_SUBJECT",'Contact');
            }

            $name = stripslashes($request->request->get('name'));
            $email = trim($request->request->get('email'));
            $body = stripslashes($request->request->get('message'));

            $custom = $request->request->get('fields');
            $custom = substr($custom, 0, -1);
            $custom = explode(',', $custom);

            $message_addition = '';
            foreach ($custom as $c) {
                if ($c !== 'name' && $c !== 'email' && $c !== 'message' && $c !== 'subject') {
                    $message_addition .= '<b>'.$c.'</b>: '.$_POST[$c].'<br />';
                }
            }

            if ($message_addition !== '') {
                $body = $body.'<br /><br />'.$message_addition;
            }


            $body = '<html><body>'.nl2br($body)."<br><br> Message from ".$email."</body></html>";

            $message = \Swift_Message::newInstance()
                ->setSubject('Email from charliebreval.com')
                ->setFrom('bonjour@charliebreval.com')
                ->setTo('charliebreval@yahoo.fr')
                ->setBody($body,'text/html')
            ;
            $mailStatus = $this->get('mailer')->send($message);

            if($mailStatus) {
                $this->addFlash(
                    'success',
                    'Your message has been sent, thank you !'
                );
            } else {
                $this->addFlash(
                    'error',
                    'Error : Your message has not been sent...'
                );
            }
        }

        return $this->render('AppBundle:Contact:index.html.twig');
    }
}
