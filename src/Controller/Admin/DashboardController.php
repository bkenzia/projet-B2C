<?php

namespace App\Controller\Admin;

use App\Controller\Admin\ImagesCrudController;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Admin\RealisationCrudController;
use App\Entity\Categorie;
use App\Entity\Commentaire;
use App\Entity\Images;
use App\Entity\Realisation;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    // public function __construct(
    //     private AdminurlGenerator $adminUrlGenerator
    //     ){
    // }
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<img src="/img/LOGO 1.png" class="w-75 p-3 " alt="...">');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Realisations', "fas fa-building", Realisation::class);
        yield MenuItem::linkToCrud('Images',  "fas fa-image", Images::class);
        yield MenuItem::linkToCrud('Catégories',  "fas fa-align-justify", Categorie::class);
        yield MenuItem::linkToCrud('Commentaires', 'fas fa-comment', Commentaire::class);
        yield MenuItem::linkToCrud('Paramétres', 'fas fa-cog', User::class);
    }
}
