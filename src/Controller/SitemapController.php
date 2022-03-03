<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\RealisationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SitemapController extends AbstractController
{
    #[Route('/sitemap.xml', name: 'sitemap', defaults:['_format'=>'xml'])]
    public function index( 
        Request $request,
        RealisationRepository $realisationRepository,
        CategorieRepository $categorieRepository,
    ): Response {
        $hostname=$request->getSchemeAndHttpHost();

        $urls=[];

        $urls[]=['loc'      =>$this->generateUrl('home')];
        $urls[]=['loc'      =>$this->generateUrl('realisations')];
        $urls[]=['loc'      =>$this->generateUrl('a_propos')];
        $urls[]=['loc'      =>$this->generateUrl('contact')];
        $urls[]=['loc'      =>$this->generateUrl('portfolio')];

        foreach ($realisationRepository->findAll() as $realisation) {
            $urls[]=[
                'loc'       =>$this->generateUrl('realisations-details', ['slug'=>$realisation->getSlug()]),
                'lastmod'   =>$realisation->getCreatedAt()->format('Y-m-d'),
            ];
        }

        foreach ($categorieRepository->findAll() as $categorie) {
            $urls[]=[
                'loc'       =>$this->generateUrl('portfolio_categorie', ['slug'=>$categorie->getSlug()]),
            ];
        }
        
        $response= new Response(
            $this->renderView('sitemap/index.html.twig', [
                'urls'      =>$urls,
                'hostname'  =>$hostname,
            ]),
            200
        );
        $response->headers->set('Content-Type', 'text/xml');

        return $response;
    }
}
