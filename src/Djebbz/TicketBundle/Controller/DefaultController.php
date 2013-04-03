<?php

namespace Djebbz\TicketBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Djebbz\TicketBundle\Model\TicketQuery;
use Djebbz\TicketBundle\Model\Ticket;
use Djebbz\TicketBundle\Form\Type\TicketType;

use \DateTime;

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

    public function addTicketAction(Request $request)
    {
        $ticket = new Ticket();

        $form = $this->createForm(new TicketType(), $ticket);

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                $ticket->setCreatedAt(new DateTime());
                $ticket->save();

                return $this->redirect($this->generateUrl(
                    'djebbz_ticket_ticket',
                    array('id' => $ticket->getId())
                ));
            }
        }

        return $this->render(
            'DjebbzTicketBundle:Default:addTicket.html.twig',
            array('form' => $form->createView())
        );
    }

    public function showTicketAction($id)
    {
        $ticket = TicketQuery::create()
            ->findPK($id);

        if (!$ticket) {
            throw $this->createNotFoundException(
                'No tickets found with id ' . $id
            );
        }

        return $this->render(
            'DjebbzTicketBundle:Default:showTicket.html.twig',
            array('ticket' => $ticket)
        );
    }
}
