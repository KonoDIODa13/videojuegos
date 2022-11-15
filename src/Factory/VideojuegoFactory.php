<?php

namespace App\Factory;

use App\Entity\Videojuego;
use App\Repository\VideojuegoRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Videojuego>
 *
 * @method static Videojuego|Proxy createOne(array $attributes = [])
 * @method static Videojuego[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Videojuego[]|Proxy[] createSequence(array|callable $sequence)
 * @method static Videojuego|Proxy find(object|array|mixed $criteria)
 * @method static Videojuego|Proxy findOrCreate(array $attributes)
 * @method static Videojuego|Proxy first(string $sortedField = 'id')
 * @method static Videojuego|Proxy last(string $sortedField = 'id')
 * @method static Videojuego|Proxy random(array $attributes = [])
 * @method static Videojuego|Proxy randomOrCreate(array $attributes = [])
 * @method static Videojuego[]|Proxy[] all()
 * @method static Videojuego[]|Proxy[] findBy(array $attributes)
 * @method static Videojuego[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Videojuego[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static VideojuegoRepository|RepositoryProxy repository()
 * @method Videojuego|Proxy create(array|callable $attributes = [])
 */
final class VideojuegoFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            // TODO add your default values here (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories)
            'titulo' => self::faker()->text(),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Videojuego $videojuego): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Videojuego::class;
    }
}
