<?php 

namespace App\Service;

use App\Repository\IngredientRepository;

class GetIngredient
{
    private $repo;

    public function __construct(IngredientRepository $ir)
    {
        $this->repo = $ir;
    }
    
    public function getAllIngredients()
    {
        $ingredients = $this->repo->findAll();
        return $ingredients;
    } 
}