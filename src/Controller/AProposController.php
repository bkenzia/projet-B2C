<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AProposController extends AbstractController
{
    #[Route('/a-propos', name: 'a_propos')]
    public function index(UserRepository $admin): Response
    {
        return $this->render('a_propos/index.html.twig', [
            'admin' => $admin->getAdmin(),
        ]);
    }
}
