<?php

namespace App\Tests;

use Symfony\Component\Panther\PantherTestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AProposFunctionalTest extends WebTestCase
{
    public function testShouldDisplayAPropos(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/a-propos');

        $this->assertResponseIsSuccessful();
    }
}
