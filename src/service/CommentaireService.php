<?php
namespace App\service;

use App\Entity\Commentaire;
use App\Entity\Realisation;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

class CommentaireService
{
    private $manager;
    private $flash;
    public function __construct(EntityManagerInterface $manager, FlashBagInterface $flash, )
    {
        $this->manager=$manager;
        $this->flash=$flash;
    }
    public function persistCommentaire(Commentaire $commentaire, Realisation $realisation): void
    {
       $commentaire->setIsPublished(false)
                    ->setRealisation($realisation)
                    ->setCreatedAt(new DateTime('now') );
        $this->manager->persist($commentaire);
        $this->manager->flush();
        $this->flash->add('success', 'Votre commentaire est bien envoyé, merci. il sera publié aprés validation');
    }

    
}
