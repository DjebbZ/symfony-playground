<?php

namespace DjebbZ\HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DjebbZHelloBundle:Default:index.html.twig', array('name' => $name));
    }

    public function indexJsonAction(Request $request)
    {
      $response = new Response(json_encode($request));
      $response->headers->set('Content-Type', 'application/json');

      return $response;
    }
}
