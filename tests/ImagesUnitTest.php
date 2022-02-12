<?php

namespace App\Tests;

use App\Entity\Images;
use PHPUnit\Framework\TestCase;

class ImagesUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $image=new Images();
        $image->setNom('test')
            ->setDescription('description')
            ->setSlug('slug')
            ->setImage('image');

        $this->assertTrue($image->getNom()==='test');
        $this->assertTrue($image->getDescription()==='description');  
        $this->assertTrue($image->getSlug()==='slug');  
        $this->assertTrue($image->getImage()==='image');  

            
    }

    public function testIsFalse()
    {
        $image=new Images();
        $image->setNom('test')
            ->setDescription('description')
            ->setSlug('slug')
            ->setImage('image');
        $this->assertFalse($image->getNom()==='false');
        $this->assertFalse($image->getDescription()==='false');  
        $this->assertFalse($image->getSlug()==='false');  
        $this->assertFalse($image->getImage()==='false');  

            
    }

    public function testIsEmpty()
    {
        $image=new Images();
        
        $this->assertEmpty($image->getNom());
        $this->assertEmpty($image->getDescription());  
        $this->assertEmpty($image->getSlug());  
        $this->assertEmpty($image->getId()); 
        $this->assertEmpty($image->getImage());
            
    }
}
