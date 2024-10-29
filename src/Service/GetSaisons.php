<?php 

namespace App\Service;

use App\Repository\SaisonRepository;

class GetSaisons 
{
    private $repo;

    public function __construct(SaisonRepository $sr)
    {
        $this->repo = $sr;
    }
    
    public function getAllSaisons()
    {
        $saisons = $this->repo->findAll();
        return $saisons;
    } 
}