<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Factory\UsuarioFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        UsuarioFactory::createOne(['username' => 'jaime']);
        UsuarioFactory::createOne();

        $manager->flush();
    }
}
