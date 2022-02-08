<?php

namespace App\Controller;

use App\Entity\Realisation;
use App\Repository\RealisationRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use ContainerPUWjEHs\PaginatorInterface_82dac15;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class RealisationController extends AbstractController
{
    #[Route('/realisations', name: 'realisations')]
    public function realisations(
        RealisationRepository $realisationRepository,
        PaginatorInterface $paginator,
        Request $request
    ): Response {
        $data=$realisationRepository->findAll();
        $realisations=$paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            6
        );

        $images=array();
        
        foreach ($realisations as $realisation) {
            array_push($images, $realisation->getImages()->toArray()) ;
        }

        //  dd($images);
        return $this->render('realisations/index.html.twig', [
            'realisations' => $realisations,
            'images'=>$images,
        ]);
    }

    #[Route('/realisations/{slug}', name: 'realisations-details')]
    public function details(Realisation $realisation): Response
    {
        return $this->render('realisations/details.html.twig', [
            'realisation'=>$realisation,
        ]);
    }
}
