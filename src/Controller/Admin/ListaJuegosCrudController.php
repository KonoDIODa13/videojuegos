<?php

namespace App\Controller\Admin;

use App\Entity\ListaJuegos;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ListaJuegosCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ListaJuegos::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('comentario');
        yield AssociationField::new('usuario');
        yield AssociationField::new('videojuego');
    }
}
