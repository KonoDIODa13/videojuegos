<?php

namespace App\Entity;

use App\Repository\EmpresaDesarrolladoraRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\ManyToMany(targetEntity: Videojuego::class, mappedBy: 'empresaDesarrolladora')]
    private Collection $videojuegos;

    public function __construct()
    {
        $this->videojuegos = new ArrayCollection();
    }

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

    public function __toString()
    {
        return $this->getDesarrolladora();
    }

    /**
     * @return Collection<int, Videojuego>
     */
    public function getVideojuegos(): Collection
    {
        return $this->videojuegos;
    }

    public function addVideojuego(Videojuego $videojuego): self
    {
        if (!$this->videojuegos->contains($videojuego)) {
            $this->videojuegos->add($videojuego);
            $videojuego->addEmpresaDesarrolladora($this);
        }

        return $this;
    }

    public function removeVideojuego(Videojuego $videojuego): self
    {
        if ($this->videojuegos->removeElement($videojuego)) {
            $videojuego->removeEmpresaDesarrolladora($this);
        }

        return $this;
    }
}
