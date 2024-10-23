<?php

namespace App\Controller\Admin;

use App\Entity\Budget;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BudgetCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Budget::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
        ];
    }
    
}
