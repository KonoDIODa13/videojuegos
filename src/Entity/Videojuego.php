<?php

namespace App\Entity;

use App\Repository\VideojuegoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Gedmo\Mapping\Annotation\Slug;

#[ORM\Entity(repositoryClass: VideojuegoRepository::class)]
#[UniqueEntity('slug')]
class Videojuego
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $titulo = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private array $director = [];

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private array $genero = [];

    #[ORM\Column(length: 4, nullable: true)]
    private ?string $fechaPublicacion = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private array $desarrollador = [];

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descripcion = null;

    #[ORM\Column(length: 50, unique: true)]
    #[Slug(fields: ['titulo'])]
    private ?string $slug = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getdirector(): array
    {
        return $this->director;
    }

    public function setdirector(array $director): self
    {
        $this->director = $director;

        return $this;
    }


    public function getgenero(): array
    {
        return $this->genero;
    }

    public function setgenero(array $genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    public function getFechaPublicacion(): ?string
    {
        return $this->fechaPublicacion;
    }

    public function setFechaPublicacion(string $fechaPublicacion): self
    {
        $this->fechaPublicacion = $fechaPublicacion;

        return $this;
    }

    public function getDesarrollador(): array
    {
        return $this->desarrollador;
    }

    public function setDesarrollador(array $desarrollador): self
    {
        $this->desarrollador = $desarrollador;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getId();
    }
}
