<?php

namespace App\Entity;

use App\Repository\ListaJuegosRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ListaJuegosRepository::class)]
class ListaJuegos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'listaJuegos', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Usuario $usuario = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $videojuegos = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsuario(): ?Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(Usuario $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getVideojuegos(): array
    {
        return $this->videojuegos;
    }

    public function setVideojuegos(array $videojuegos): self
    {
        $this->videojuegos = $videojuegos;

        return $this;
    }
}
