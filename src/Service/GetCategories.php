<?php 

namespace App\Service;

use App\Repository\CategorieRepository;

class GetCategories 
{
    private $repo;

    public function __construct(CategorieRepository $cr)
    {
        $this->repo = $cr;
    }

    public function getAllCategories()
    {
        $categories = $this->repo->findAll();
        return $categories;
    } 
}