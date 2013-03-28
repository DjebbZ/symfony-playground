<?php

namespace Djebbz\TicketBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DjebbzTicketBundle:Default:index.html.twig', array('content' => 'Test content'));
    }
}
