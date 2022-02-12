<?php

namespace App\Tests;

use App\Entity\BlogPost;
use App\Entity\Realisation;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $user=new User();
        $user->setEmail('lili@test.com')
            ->setPrenom('prenom')
            ->setNom('nom')
            ->setPassword('password')
            ->setAPropos('a propos')
            ->setInstagram('instagram')
            ->setTelephone('0123456789')
            ->setRoles(['ROLE_TEST']);
        $this->assertTrue($user->getEmail()==='lili@test.com');
        $this->assertTrue($user->getUserIdentifier() ==='lili@test.com');
        $this->assertTrue($user->getPrenom()==='prenom');  
        $this->assertTrue($user->getNom()==='nom');  
        $this->assertTrue($user->getPassword()==='password'); 
        $this->assertTrue($user->getAPropos()==='a propos'); 
        $this->assertTrue($user->getInstagram()==='instagram');  
        $this->assertTrue($user->getTelephone()==='0123456789'); 
        $this->assertTrue($user->getRoles()===['ROLE_TEST', 'ROLE_USER']);    
   
  
    }

    public function testIsFalse()
    {   
        $user=new User();
        $user->setEmail('lili@test.com')
            ->setPrenom('prenom')
            ->setNom('nom')
            ->setPassword('password')
            ->setAPropos('a prorpos')
            ->setInstagram('instagram')
            ->setTelephone('0123456789')
            ->setRoles(['ROLE_TEST']);
        $this->assertFalse($user->getEmail()==='false@test.com');
        $this->assertFalse($user->getUserIdentifier()==='false@test.com');
        $this->assertFalse($user->getPrenom()==='false');  
        $this->assertFalse($user->getNom()==='false');  
        $this->assertFalse($user->getPassword()==='false'); 
        $this->assertFalse($user->getAPropos()==='false'); 
        $this->assertFalse($user->getInstagram()==='false'); 
        $this->assertFalse($user->getTelephone()==='8612304578');
        $this->assertFalse($user->getRoles()===['ROLE_ADMIN', 'ROLE_USER']);    
    
   
    }


    public function testIsEmpty()
    {
        $user=new User();
        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getUserIdentifier());
        $this->assertEmpty($user->getPrenom());  
        $this->assertEmpty($user->getNom());  
        // $this->assertEmpty($user->getPassword()); 
        $this->assertEmpty($user->getPassword(''));
        $this->assertEmpty($user->getAPropos()); 
        $this->assertEmpty($user->getInstagram()); 
         $this->assertEmpty($user->getId());    
    }

    public function testAddGetRemoveRealisation()
    {
        $user=new User();
        $realisation=new Realisation();
        $this->assertEmpty($user->getRealisations());
       
        $user->addRealisation($realisation);
        $this->assertContains($realisation, $user->getRealisations());

        $user->removeRealisation($realisation);   
        $this->assertEmpty($user->getRealisations());

    }

    public function testAddGetRemoveBlogpost()
    {
        $user=new User();
        $blogpost=new BlogPost();
        $this->assertEmpty($user->getBlogPosts());
       
        $user->addBlogPost($blogpost);
        $this->assertContains($blogpost, $user->getBlogPosts());

        $user->removeBlogPost($blogpost);   
        $this->assertEmpty($user->getBlogPosts());

    }
}
