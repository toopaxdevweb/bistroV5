<?php 

namespace App\Service;

use App\Repository\BudgetRepository;

class GetBudget 
{
    private $repo;

    public function __construct(BudgetRepository $br)
    {
        $this->repo = $br;
    }
    
    public function getAllBudget()
    {
        $budgets = $this->repo->findAll();
        return $budgets;
    } 
}