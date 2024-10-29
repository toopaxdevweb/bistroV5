<?php

namespace App\Controller;

use App\Entity\Ingredient;
use App\Form\AddIngredientsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IngredientsController extends AbstractController
{
    #[Route('/ingredients', name: 'app_ingredients')]
    public function index(): Response
    {
        return $this->render('ingredients/index.html.twig', [
            'controller_name' => 'IngredientsController',
        ]);
    }
    #[Route('/ingredients/add', name: 'app_ingredients_add')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
       
        $recette = new Ingredient();

        
        $form = $this->createForm(AddIngredientsType::class, $recette);
        $form->handleRequest($request);

        // Vérifier si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Enregistrer la recette dans la base de données
            $em->persist($recette);
            $em->flush();

            // Rediriger vers la liste des recettes
            return $this->redirectToRoute('app_recettes');
        }

        // Afficher le formulaire
        return $this->render('ingredients/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
