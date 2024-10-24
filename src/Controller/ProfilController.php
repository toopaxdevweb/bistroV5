<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
    public function index(CategorieRepository $cr): Response
    {
        $categorie = $cr->findAll();
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'ProfilController',
            'categorie' => $categorie,
        ]);
    }
}

 
