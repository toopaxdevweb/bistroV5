<?php

namespace App\Controller\Admin;

use App\Entity\UniteDeMesure;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UniteDeMesureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return UniteDeMesure::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
        ];
    }

}
