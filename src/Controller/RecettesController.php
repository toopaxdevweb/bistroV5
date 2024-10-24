<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RecettesController extends AbstractController
{
    #[Route('/recettes', name: 'app_recettes')]
    public function index(CategorieRepository $cr): Response
    { 
        $categorie = $cr->findAll();
        return $this->render('recettes/index.html.twig', [
            'controller_name' => 'RecettesController',
            'categorie' => $categorie,
        ]);
    }
}


