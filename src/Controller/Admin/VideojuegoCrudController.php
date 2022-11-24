<?php

namespace App\Controller\Admin;

use App\Entity\Videojuego;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
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
            ->setSearchFields(['titulo', 'autor', 'tema', 'fechaPublicacion', 'desarrollador', 'descripcion', 'slug']);
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('titulo');
        yield ArrayField::new('autor');
        yield ArrayField::new('tema');
        yield TextField::new('fechaPublicacion');
        yield ArrayField::new('desarrollador');
        yield TextareaField::new('descripcion')
            ->hideOnIndex();
        yield TextField::new('slug');
    }
}
