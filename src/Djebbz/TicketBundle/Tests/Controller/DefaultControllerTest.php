<?php

namespace Djebbz\TicketBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $client->request('GET', '/home');

        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    public function testShowAll()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/tickets');

        $this->assertTrue($client->getResponse()->isSuccessful());

        $this->assertEquals(
            'Viewing all tickets',
            $crawler->filter('h1')->text()
        );
    }
}
