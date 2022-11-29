<?php

namespace App\Controller\Admin;

use App\Entity\Genero;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class GeneroCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Genero::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('genero');
        yield AssociationField::new('videojuego');
    }
}
