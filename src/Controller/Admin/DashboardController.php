<?php

namespace App\Controller\Admin;

use App\Controller\Admin\ImagesCrudController;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Admin\RealisationCrudController;
use App\Entity\Images;
use App\Entity\Realisation;
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
        // return parent::index();
        // $url=$this->adminUrlGenerator->setController(RealisationCrudController::class)->generateUrl();
        



        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        //  return $this->redirect($url);

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
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
        yield MenuItem::linkToCrud('Realisations', 'fas fa-list', Realisation::class);
        yield MenuItem::linkToCrud('Images', 'fas fa-list', Images::class);
    }
}
