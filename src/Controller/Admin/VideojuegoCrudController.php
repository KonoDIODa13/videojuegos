<?php

namespace App\Controller\Admin;

use App\Entity\Videojuego;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class VideojuegoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Videojuego::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setSearchFields(['titulo', 'director', 'genero', 'fechaPublicacion', 'desarrollador', 'descripcion']);
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('titulo');
        yield ArrayField::new('director')->hideOnForm();
        yield ArrayField::new('genero')->hideOnForm();
        yield TextField::new('fechaPublicacion');
        yield ArrayField::new('empresaDesarrolladora')->hideOnForm();
        yield TextareaField::new('descripcion')
            ->hideOnIndex();
    }
}
