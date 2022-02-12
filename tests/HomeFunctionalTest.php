<?php

namespace App\Tests;

use Symfony\Component\Panther\PantherTestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeFunctionalTest extends WebTestCase
{
    public function testShouldDisplayHomepage(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('p', 'Rénovation, entretien et dépannage en Île-de-France');
        $this->assertSelectorTextContains('a', 'Découvrir B2C');
    }
}
