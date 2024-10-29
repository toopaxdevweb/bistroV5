<?php

namespace App\Controller;

use App\Entity\Ustensile;
use App\Form\AddUstensileType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UstensileController extends AbstractController
{
    #[Route('/ustensile', name: 'app_ustensile')]
    public function index(): Response
    {
        return $this->render('ustensile/index.html.twig', [
            'controller_name' => 'UstensileController',
        ]);
    }
    #[Route('/ustensile/add', name: 'app_ustensile_add')]
        public function new(Request $request, EntityManagerInterface $em): Response
        {
           
            $ustensile = new Ustensile();
    
            
            $form = $this->createForm(AddUstensileType::class, $ustensile);
            $form->handleRequest($request);
    
            // Vérifier si le formulaire est soumis et valide
            if ($form->isSubmitted() && $form->isValid()) {
                // Enregistrer le tag dans la base de données
                $em->persist($ustensile);
                $em->flush();
    
                
                return $this->redirectToRoute('app_ustensile');
            }
    
            // Afficher le formulaire
            return $this->render('ustensile/add.html.twig', [
                'form' => $form->createView(),
            ]);
        }
}
