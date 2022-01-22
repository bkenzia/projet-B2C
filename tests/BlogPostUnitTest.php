<?php

namespace App\Tests;

use App\Entity\BlogPost;
use App\Entity\User;
use DateTime;
use PHPUnit\Framework\TestCase;

class BlogPostUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $blogPost=new BlogPost();
        $datetime=new DateTime();
        
        $user=new User();
        $blogPost->setTitre('titre')
             ->setCreatedAt($datetime)
             ->setContenu('contenu')
             ->setSlug('slug')
             ->setUser($user);

        $this->assertTrue($blogPost->getTitre()==='titre');
        $this->assertTrue($blogPost->getCreatedAt()===$datetime);  
        $this->assertTrue($blogPost->getContenu()==='contenu');  
        $this->assertTrue($blogPost->getUser()===$user); 
   
    }

    public function testIsFalse()
    {
        $blogPost=new BlogPost();
        $datetime=new DateTime();
        
        $user=new User();
        $blogPost->setTitre('titre')
             ->setCreatedAt($datetime)
             ->setContenu('contenu')
             ->setSlug('slug')
             ->setUser($user);

        $this->assertFalse($blogPost->getTitre()==='false');
        $this->assertFalse($blogPost->getCreatedAt()===new DateTime());  
        $this->assertFalse($blogPost->getContenu()==='false');  
        $this->assertFalse($blogPost->getUser()===new User()); 
   
    }

    public function testIsEmpty()
    {
        $blogPost=new BlogPost();
        
        $user=new User();

        $this->assertEmpty($blogPost->getTitre());
        $this->assertEmpty($blogPost->getCreatedAt());  
        $this->assertEmpty($blogPost->getContenu());  
        $this->assertEmpty($blogPost->getUser()); 
   
    }
}
