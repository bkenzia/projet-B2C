<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Entity\Realisation;
use App\Form\CommentaireType;
use App\Repository\CommentaireRepository;
use App\service\CommentaireService;
use App\Repository\RealisationRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use ContainerPUWjEHs\PaginatorInterface_82dac15;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RealisationController extends AbstractController
{
    #[Route('/realisations', name: 'realisations')]
    public function realisations(
        RealisationRepository $realisationRepository,
        PaginatorInterface $paginator,
        Request $request
    ): Response {
        $data=$realisationRepository->findBy([], ['id'=>'DESC']);
        $realisations=$paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            6
        );

        $images=array();
        
        foreach ($realisations as $realisation) {
            array_push($images, $realisation->getImages()->toArray()) ;
        }

        
        return $this->render('realisations/index.html.twig', [
            'realisations' => $realisations,
            'images'=>$images,
        ]);
    }

    #[Route('/realisations/{slug}', name: 'realisations-details')]
    public function details(
        Realisation $realisation,
        Request $request, 
        CommentaireService $commentaireService,
        CommentaireRepository $commentaireRepository
        ): Response
    {
        $commentaires=$commentaireRepository->findCommentaires($realisation);
     
        $commentaire=new Commentaire();
        $form=$this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $commentaire=$form->getData();
            $commentaireService->persistCommentaire($commentaire, $realisation, null);
            return $this->redirectToRoute('realisations-details',['slug'=>$realisation->getSlug()]);
        }
       
        return $this->render('realisations/details2.html.twig', [
            'realisation'=>$realisation,
            'form'=>$form->createView(),
            'commentaires'=>$commentaires,
        ]);
    }
}
