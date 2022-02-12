<?php

namespace App\Tests;

use App\Entity\BlogPost;
use App\Entity\Commentaire;
use App\Entity\Realisation;
use DateTime;
use PHPUnit\Framework\TestCase;

class CommentaireUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $commentaire=new Commentaire();
        $blogPost=new BlogPost();
        $datetime=new DateTime();
        $realisation= new Realisation;
        $commentaire->setAuteur('auteur')
             ->setEmail('lili@test.com')
             ->setCreatedAt($datetime)
             ->setContenu('contenu')
             ->setBlogPost($blogPost)
             ->setRealisation($realisation);

        $this->assertTrue($commentaire->getAuteur()==='auteur');
        $this->assertTrue($commentaire->getContenu()==='contenu');  
        $this->assertTrue($commentaire->getRealisation()===$realisation); 
        $this->assertTrue($commentaire->getBlogPost()===$blogPost); 

    }


    public function testIsFalse()
    {
        $commentaire=new Commentaire();
        $blogPost=new BlogPost();
        $datetime=new DateTime();
        $realisation= new Realisation;
        $commentaire->setAuteur('auteur')
             ->setEmail('lili@test.com')
             ->setCreatedAt($datetime)
             ->setContenu('contenu')
             ->setBlogPost($blogPost)
             ->setRealisation($realisation);

        $this->assertFalse($commentaire->getAuteur()==='false');
        $this->assertFalse($commentaire->getContenu()==='false');  
        $this->assertFalse($commentaire->getRealisation()===new Realisation()); 
        $this->assertFalse($commentaire->getBlogPost()===new BlogPost()); 

    }

    public function testIsEmpty()
    {
        $commentaire=new Commentaire();
        

        $this->assertEmpty($commentaire->getAuteur());
        $this->assertEmpty($commentaire->getContenu());  
        $this->assertEmpty($commentaire->getRealisation()); 
        $this->assertEmpty($commentaire->getBlogPost());
        $this->assertEmpty($commentaire->getId()); 
        $this->assertEmpty($commentaire->getEmail()); 
         $this->assertEmpty($commentaire->getCreatedAt()); 

    }
}
