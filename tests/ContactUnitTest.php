<?php

namespace App\Tests;

use DateTime;
use App\Entity\Contact;
use phpDocumentor\Reflection\PseudoTypes\True_;
use PHPUnit\Framework\TestCase;

class ContactUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $contact=new Contact();
        $datetime=new DateTime();
        
        $contact->setNom('nom')
             ->setCreatedAt($datetime)
             ->setMessage('message')
             ->setEmail('test@test.com')
             ->setIsSend(True);

        $this->assertTrue($contact->getNom()==='nom');
        $this->assertTrue($contact->getCreatedAt()===$datetime);  
        $this->assertTrue($contact->getMessage()==='message');  
        $this->assertTrue($contact->getEmail()==='test@test.com'); 
        $this->assertTrue($contact->getIsSend()===True); 
    }

    public function testIsFalse()
    {
        $contact=new Contact();
        $datetime=new DateTime();

        $contact->setNom('nom')
            ->setCreatedAt($datetime)
            ->setMessage('message')
            ->setEmail('test@test.com')
            ->setIsSend(True);
        $this->assertFalse($contact->getNom()==='false');
        $this->assertFalse($contact->getCreatedAt()===new DateTime()); 
        $this->assertFalse($contact->getMessage()==='false');
        $this->assertFalse($contact->getEmail()==='false');  
    }

     public function testIsEmpty()
    {
        $contact=new Contact();
        
        $this->assertEmpty($contact->getNom());
        $this->assertEmpty($contact->getCreatedAt()); 
        $this->assertEmpty($contact->getMessage());  
        $this->assertEmpty($contact->getId()); 
        $this->assertEmpty($contact->getEmail());
   
    }

}
