<?php
//a refaire puisque il ya une error 
namespace App\Tests;

use Symfony\Component\Panther\PantherTestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LoginFunctionalTest extends WebTestCase
{
    public function testShouldDisplayLogin(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Ouvrir une session');
    }

    public function testvisitingWhileLoggedIn(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');
        $form=$crawler->selectButton(value:'Ouvrir une session')->form([
            'email'=>'user@test.com',
            'password'=>'password',
        ]);

       
        
        $client->submit($form);
        
        $crawler = $client->request('GET', '/login');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('div', 'You are logged in as user@test.com');
    }
}
