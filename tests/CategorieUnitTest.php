<?php

namespace App\Tests;

use App\Entity\Categorie;
use App\Entity\Images;
use App\Entity\Realisation;
use PHPUnit\Framework\TestCase;

class CategorieUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $categorie=new Categorie();
        $categorie->setNom('test')
            ->setDescription('description')
            ->setSlug('slug');
        $this->assertTrue($categorie->getNom()==='test');
        $this->assertTrue($categorie->getDescription()==='description');  
        $this->assertTrue($categorie->getSlug()==='slug');  
            
    }

    public function testIsFalse()
    {
        $categorie=new Categorie();
        $categorie->setNom('test')
            ->setDescription('description')
            ->setSlug('slug');
        $this->assertFalse($categorie->getNom()==='false');
        $this->assertFalse($categorie->getDescription()==='false');  
        $this->assertFalse($categorie->getSlug()==='false');  
            
    }

    public function testIsEmpty()
    {
        $categorie=new Categorie();
        
        $this->assertEmpty($categorie->getNom());
        $this->assertEmpty($categorie->getDescription());  
        $this->assertEmpty($categorie->getSlug());  
        $this->assertEmpty($categorie->getId()); 
            
    }

    public function testAddGetRemoveRealisation()
    {
        $realisation=new Realisation();
        $categorie=new Categorie();
        $this->assertEmpty($categorie->getRealisations());
       
        $categorie->addRealisation($realisation);
        $this->assertContains($realisation, $categorie->getRealisations());

        $categorie->removeRealisation($realisation);   
        $this->assertEmpty($categorie->getRealisations());

    }


    public function testAddGetRemoveImage()
    {
        $image=new Images();
        $categorie=new Categorie();
        $this->assertEmpty($categorie->getImages());
       
        $categorie->addImage($image);
        $this->assertContains($image, $categorie->getImages());

        $categorie->removeImage($image);   
        $this->assertEmpty($categorie->getImages());

    }
}
