<?php

namespace App\Controller\Admin;

use App\Entity\Budget;
use App\Entity\Categorie;
use App\Entity\Commentaire;
use App\Entity\Difficulte;
use App\Entity\Ingredient;
use App\Entity\Recette;
use App\Entity\Tag;
use App\Entity\UniteDeMesure;
use App\Entity\User;
use App\Entity\Ustensile;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return parent::index();

         //Option 1. You can make your dashboard redirect to some common page of your backend
        
         $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
         return $this->redirect($adminUrlGenerator->setController(CategorieCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Bistro');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Categorie', 'fas fa-list', Categorie::class);
        yield MenuItem::linkTocrud('Budget', 'fas fa-list', Budget::class);
        yield MenuItem::linkTocrud('Commentaire', 'fas fa-list', Commentaire::class);
        yield MenuItem::linkTocrud('Difficulte', 'fas fa-list', Difficulte::class);
        yield MenuItem::linkTocrud('Ingredient', 'fas fa-list', Ingredient::class);
        yield MenuItem::linkTocrud('Recette', 'fas fa-list', Recette::class);
        yield MenuItem::linkTocrud('Tag', 'fas fa-list', Tag::class);
        yield MenuItem::linkTocrud('UniteDeMesure', 'fas fa-list', UniteDeMesure::class);
        yield MenuItem::linkTocrud('User', 'fas fa-list', User::class);
        yield MenuItem::linkTocrud('Ustensile', 'fas fa-list', Ustensile::class);
    }
}
