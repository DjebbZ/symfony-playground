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

    public function showAllTicketsAction()
    {
        $tickets = TicketQuery::create()
            ->find();

        if (!$tickets) {
            throw $this->createNotFoundException(
                'No tickets found.'
            );
        }

        $message = '';

        if (0 === count($tickets)) {
            $message = 'Sorry, no tickets at all. Be the first to create one !';
        }

        return $this->render(
            'DjebbzTicketBundle:Default:showAllTickets.html.twig',
            array(
                'tickets' => $tickets,
                'message' => $message,
            )
        );
    }
}
