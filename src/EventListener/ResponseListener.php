<?php


namespace App\EventListener;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
class ResponseListener
{
    public function doSomething(FilterResponseEvent $event)
    {
//       $response = $event->setExpires(new \DateTime());
        $response = $event->getResponse();

    }

}