<?php

namespace App\Controller\Admin;

use App\Entity\ListaJuegos;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ListaJuegosCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ListaJuegos::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
