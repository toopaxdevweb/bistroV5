<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CategorieController extends AbstractController
{
    #[Route('/categorie', name: 'app_categorie')]
    public function index(CategorieRepository $cr): Response
    {
        $categorie = $cr->findAll();

        return $this->render('categorie/index.html.twig', [
            'controller_name' => 'CategorieController',
            'categorie' => $categorie,
                ]);
    }
    
    #[Route('/categorie/{id}', name: 'app_categorie_show')]
    public function show(CategorieRepository $cr, $id): Response
    {
        $categorie = $cr->findAll();
        $categorieId = $cr->find($id);

        return $this->render('categorie/show.html.twig', [
            'controller_name' => 'CategorieController',
            'categorie' => $categorie,
            'categorieId' => $categorieId,
            ]);
    }
}
