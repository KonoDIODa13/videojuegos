<?php

namespace App\Controller\Admin;

use App\Entity\Videojuego;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;

class VideojuegoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Videojuego::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
        ->add(EntityFilter::new('director'))
        ->add(EntityFilter::new('genero'))
        //->add(EntityFilter::new('fechaPublicacion'))
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('titulo');

        yield ArrayField::new('director')
            ->hideOnForm();
        yield AssociationField::new('director')
            ->hideOnIndex();

        yield ArrayField::new('genero')
            ->hideOnForm();
        yield AssociationField::new('genero')
            ->hideOnIndex();

        yield TextField::new('fechaPublicacion');

        yield ArrayField::new('empresaDesarrolladora')
            ->hideOnForm();
        yield AssociationField::new('empresaDesarrolladora')
            ->hideOnIndex();

        yield ArrayField::new('plataforma')
            ->hideOnForm();
        yield AssociationField::new('plataforma')
            ->hideOnIndex();

        yield TextareaField::new('descripcion')
            ->hideOnIndex();
    }
}
