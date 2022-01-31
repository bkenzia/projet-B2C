<?php

namespace App\Controller;

use App\Repository\RealisationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(RealisationRepository $realisationRepository): Response
    {
       $realisations=$realisationRepository->lastRealisation(4);
        return $this->render('home/index.html.twig', [
            'realisations' => $realisations,
            
        ]);
    }
}
