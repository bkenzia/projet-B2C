<?php

namespace App\Controller;

use App\Repository\RealisationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Faker\Factory;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(RealisationRepository $realisationRepository): Response
    {
        $realisations=$realisationRepository->lastRealisation(3);
        $images=array();
        
        foreach ($realisations as $realisation) {
            array_push($images, [$realisation->getImages()->toArray(),$realisation->getCreatedAt(),$realisation->getNom()]) ;
        }

        //   dd($images[0][0][0]->getCategorie()->getNom());

        
        return $this->render('home/index.html.twig', [
            'realisations' => $realisations,
            'images'=>$images,
            
        ]);
    }
}
