<?php

namespace App\Controller\Admin;

use App\Entity\Videojuego;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VideojuegoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Videojuego::class;
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
