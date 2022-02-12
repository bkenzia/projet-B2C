<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PortfolioFunctionalTest extends WebTestCase
{
    public function testShouldDisplayPorfolio(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/portfolio');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Portfolio');
    }

    public function testShouldDisplayOneCategorie(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/portfolio/categorie-test');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'categorie test');
    }
}
