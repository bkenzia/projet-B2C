<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use App\Repository\RealisationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PortfolioController extends AbstractController
{
    #[Route('/portfolio', name: 'portfolio')]
    public function index(CategorieRepository $categorieRepository): Response
    {
        // dd($categorieRepository->findAll()[0]->getRealisations()->toArray());
        return $this->render('portfolio/index.html.twig', [
            'categories' => $categorieRepository->findAll(),
        ]);
    }
    
    #[Route('/portfolio/{slug}', name: 'portfolio_categorie')]
    public function categorie(Categorie $categorie, RealisationRepository $realisationRepository): Response
    {
        $realisations=$realisationRepository->findAllPortfolio($categorie);
       
        // recuperer les images de la meme categorie
       $images=array();
        
        foreach ($realisations as $realisation) {
            $imagesCategorie=$realisation->getImages()->toArray();
            foreach ($imagesCategorie as $imagecatego){

                if ($imagecatego->getCategorie()->getNom()==$categorie->getNom()) {
                    array_push($images,$imagecatego ) ;
                }
            }
            
             
        }
     
         return $this->render('portfolio/categorie.html.twig', [
            'categorie' => $categorie,
            'realisations' =>$realisations,
            'images'=>$images,
        ]);
    }

}
