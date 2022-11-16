<?php

namespace App\DataFixtures;

use App\Factory\UsuarioFactory;
use App\Factory\VideojuegoFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        UsuarioFactory::createOne(['username' => 'jaime', 'contra' => 'jgb13']);
        //UsuarioFactory::createMany(5);
        VideojuegoFactory::createOne([
            'titulo' => 'God Of War: Ragnarok',
            'autor' => ['Cory Barlog', 'Eric Williams'],
            'tema' => ['Accion', 'aventura'],
            'fechaPublicacion' => 2022,
            'desarrollador' => ['Santa-Monica-Studios'],
            'slug' => 'GodOfWar:Ragnarok'
        ]);
        //VideojuegoFactory::createMany(9);

        $manager->flush();
    }
}
