<?php

namespace App\Controller;

use App\Entity\Tag;
use App\Form\AddTagType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TagController extends AbstractController
{
    #[Route('/tag', name: 'app_tag')]
    public function index(): Response
    {
        return $this->render('tag/index.html.twig', [
            'controller_name' => 'TagController',
        ]);
    }
    #[Route('/tag/add', name: 'app_Tag_add')]
        public function new(Request $request, EntityManagerInterface $em): Response
        {
           
            $tag = new Tag();
    
            
            $form = $this->createForm(AddTagType::class, $tag);
            $form->handleRequest($request);
    
            // Vérifier si le formulaire est soumis et valide
            if ($form->isSubmitted() && $form->isValid()) {
                // Enregistrer le tag dans la base de données
                $em->persist($tag);
                $em->flush();
    
                
                return $this->redirectToRoute('app_tag');
            }
    
            // Afficher le formulaire
            return $this->render('tag/add.html.twig', [
                'form' => $form->createView(),
            ]);
        }
}
