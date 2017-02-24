<?php

namespace AppBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class RequestListener
{
    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        if (!$event->isMasterRequest()) {
            return;
        }

        $lang = substr($request->server->get('HTTP_ACCEPT_LANGUAGE', 'en'), 0, 2);
        $initLocale = $request->getSession()->get('_init_locale', null);
        if (null === $initLocale && $lang === 'fr') {
            $request->getSession()->set('_init_locale', $lang);
            $request->setLocale($lang);
        }
    }
}
