<?php

namespace App\Controller;


use App\Repository\CategorieRepository;

use App\Repository\CommentaireRepository;
use App\Repository\RecetteRepository;
use App\Repository\BudgetRepository;
use App\Repository\IngredientRepository;
use App\Repository\SaisonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RecettesController extends AbstractController
{
    #[Route('/recettes', name: 'app_recettes')]

    public function index(RecetteRepository $rr, CommentaireRepository $cr, CategorieRepository $cr,IngredientRepository $ing, SaisonRepository $sr, BudgetRepository $br): Response
    { 
        $recettes = $rr->findAll();
        $averageNotes = [];
        $saison = $sr->findAll();
        $budget = $br->findAll();
        $ingredient = $ing->findAll();
        $categorie = $cr->findAll();

        //affichage de la note
        foreach ($recettes as $recette) {
            $commentaires = $cr->findBy(['recette' => $recette]);
            $totalNotes = 0;
            $count = count($commentaires);

            foreach ($commentaires as $commentaire) {
                $totalNotes += (float)$commentaire->getNote();
            }

            $averageNotes[$recette->getId()] = $count > 0 ? $totalNotes / $count : null;
        }

        return $this->render('recettes/index.html.twig', [
            'recettes' => $recettes,
            'averageNotes' => $averageNotes,
            'categorie' => $categorie,
            'saison' => $saison,
            'budget' => $budget,
            'ingredient' => $ingredient,
        ]);
    }

    #[Route('/recettes/{id}', name: 'app_recettes_show')]
    public function show(RecetteRepository $rr, $id): Response
    { 
        $oneRec = $rr->find($id);
        $recettes = $rr->findAll();
        return $this->render('recettes/show.html.twig', [
            'categorie' => $oneRec,
            'categories' => $recettes,
        ]);
    }
}
