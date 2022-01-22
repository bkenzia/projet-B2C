<?php

namespace App\Tests;

use App\Entity\Categorie;
use App\Entity\Realisation;
use App\Entity\User;
use DateTime;
use PHPUnit\Framework\TestCase;

class RealisationUnitTest extends TestCase
{
   public function testIsTrue()
    {
        $realisation=new Realisation();
        $datetime=new DateTime();
        $categorie=new Categorie();
        $user=new User();
        $realisation->setNom('nom')
             ->setDateRealisation($datetime)
             ->setCreatedAt($datetime)
             ->setDescription('description')
             ->setPortfolio(true)
             ->setSlug('slug')
             ->setFile('file')
             ->addCategorie($categorie)
             ->setUser($user);

        $this->assertTrue($realisation->getNom()==='nom');
        $this->assertTrue($realisation->getDateRealisation()===$datetime);  
        $this->assertTrue($realisation->getDescription()==='description');  
        $this->assertTrue($realisation->getPortfolio()===true); 
        $this->assertTrue($realisation->getFile()==='file'); 
        $this->assertContains($categorie, $realisation->getCategorie()); 
        $this->assertTrue($realisation->getUser()===$user); 
   
    }

    public function testIsFalse()
    {
        $realisation=new Realisation();
        $datetime=new DateTime();
        $categorie=new Categorie();
        $user=new User();
        $realisation->setNom('nom')
             ->setDateRealisation($datetime)
             ->setCreatedAt($datetime)
             ->setDescription('description')
             ->setPortfolio(true)
             ->setSlug('slug')
             ->setFile('file')
             ->addCategorie($categorie)
             ->setUser($user);

        $this->assertFalse($realisation->getNom()==='false');
        $this->assertFalse($realisation->getDateRealisation()===new DateTime()); 
        $this->assertFalse($realisation->getCreatedAt()===new DateTime()); 
        $this->assertFalse($realisation->getDescription()==='false');  
        $this->assertFalse($realisation->getPortfolio()===false); 
        $this->assertFalse($realisation->getFile()==='false'); 
        $this->assertNotContains(New Categorie, $realisation->getCategorie()); 
        $this->assertFalse($realisation->getUser()===New User); 
   
    }


     public function testIsEmpty()
    {
        $realisation=new Realisation();
        
        $this->assertEmpty($realisation->getNom());
        $this->assertEmpty($realisation->getDateRealisation()); 
        $this->assertEmpty($realisation->getCreatedAt()); 
        $this->assertEmpty($realisation->getDescription());  
        $this->assertEmpty($realisation->getPortfolio()); 
        $this->assertEmpty($realisation->getFile()); 
        $this->assertEmpty($realisation->getCategorie()); 
        $this->assertEmpty($realisation->getUser()); 
   
    }
}
