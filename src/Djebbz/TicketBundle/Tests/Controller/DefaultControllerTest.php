<?php

namespace Djebbz\TicketBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $browser = $client->request('GET', '/home');

        $this->assertTrue($client->getResponse()->isSuccessful());
    }
}
