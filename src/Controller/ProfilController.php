<?php

namespace App\Controller;

use App\Repository\BudgetRepository;
use App\Repository\IngredientRepository;
use App\Repository\SaisonRepository;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]

    public function index(CategorieRepository $cr, IngredientRepository $ing, SaisonRepository $sr, BudgetRepository $br): Response
    {
        $saison = $sr->findAll();
        $budget = $br->findAll();
        $ingredient = $ing->findAll();
        $categorie = $cr->findAll();
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'ProfilController',
            'categorie' => $categorie,
            'saison' => $saison,
            'budget' => $budget,
            'ingredient' => $ingredient,
        ]);
    }
}

