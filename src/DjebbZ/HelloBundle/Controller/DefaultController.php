<?php

namespace DjebbZ\HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DjebbZHelloBundle:Default:index.html.twig', array('name' => $name));
    }

    public function indexJsonAction($name, $_route)
    {
      $json = array(
        'name' => $name,
        'route' => $_route
      );
      $response = new Response(json_encode($json));
      $response->headers->set('Content-Type', 'application/json');

      return $response;
    }
}
