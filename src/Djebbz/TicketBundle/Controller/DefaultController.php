<?php

namespace Djebbz\TicketBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Djebbz\TicketBundle\Model\TicketQuery;
use Djebbz\TicketBundle\Model\Ticket;

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

    public function addTicketFormAction(Request $request)
    {
        $ticket = new Ticket();

        $form = $this->createFormBuilder($ticket)
            ->add('title', 'text')
            ->add('description', 'textarea')
            ->getForm();

        return $this->render(
            'DjebbzTicketBundle:Default:addTicketForm.html.twig',
            array('form' => $form->createView())
        );
    }
}
