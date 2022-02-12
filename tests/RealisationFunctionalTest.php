<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RealisationFunctionalTest extends WebTestCase
{
    public function testShouldDisplayRealisation(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/realisations');
        $this->assertResponseIsSuccessful();
    }

    public function testShouldDisplayOneRealisation(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/realisations/realisation-test');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'realisation test');
    }
}
