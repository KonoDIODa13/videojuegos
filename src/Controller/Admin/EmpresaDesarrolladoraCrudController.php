<?php

namespace App\Controller\Admin;

use App\Entity\EmpresaDesarrolladora;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EmpresaDesarrolladoraCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EmpresaDesarrolladora::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('desarrolladora');
        yield AssociationField::new('videojuego');
    }
}
