<?php

namespace App\Entity;

use App\Repository\EmpresaDesarrolladoraRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmpresaDesarrolladoraRepository::class)]
class EmpresaDesarrolladora
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $desarrolladora = null;

    #[ORM\ManyToOne(inversedBy: 'empresaDesarrolladora')]
    private ?Videojuego $videojuego = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesarrolladora(): ?string
    {
        return $this->desarrolladora;
    }

    public function setDesarrolladora(string $desarrolladora): self
    {
        $this->desarrolladora = $desarrolladora;

        return $this;
    }

    public function getVideojuego(): ?Videojuego
    {
        return $this->videojuego;
    }

    public function setVideojuego(?Videojuego $videojuego): self
    {
        $this->videojuego = $videojuego;

        return $this;
    }
    public function __toString()
    {
        return $this->desarrolladora;
    }
}
