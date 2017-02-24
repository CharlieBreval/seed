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
            // don't do anything if it's not the master request
            return;
        }

        $lang = substr($request->server->get('HTTP_ACCEPT_LANGUAGE', 'en'), 0, 2);
        if ($lang === 'fr') {
            $locale = $request->setLocale($lang);
        }
    }
}
