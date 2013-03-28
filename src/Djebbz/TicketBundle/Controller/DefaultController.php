<?php

namespace Djebbz\TicketBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Djebbz\TicketBundle\Model\TicketQuery;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render(
            'DjebbzTicketBundle:Default:index.html.twig',
            array('content' => 'Test content')
        );
    }

    public function showAllTicketAction()
    {
        $tickets = TicketQuery::create()
            ->find();

        if (!$tickets) {
            throw $this->createNotFoundException(
                'Sorry, no tickets found. You can create one !'
            );
        }

        return $this->render(
            'DjebbzTicketBundle:Default:showAll.html.twig',
            array('tickets' => $tickets)
        );
    }
}
