<?php

namespace App\Entity;

use App\Repository\GeneroRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GeneroRepository::class)]
class Genero
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $genero = null;

    #[ORM\ManyToMany(targetEntity: Videojuego::class, mappedBy: 'genero')]
    private Collection $videojuegos;

    public function __construct()
    {
        $this->videojuegos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGenero(): ?string
    {
        return $this->genero;
    }

    public function setGenero(string $genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    public function __toString()
    {
        return $this->getGenero();
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
            $videojuego->addGenero($this);
        }

        return $this;
    }

    public function removeVideojuego(Videojuego $videojuego): self
    {
        if ($this->videojuegos->removeElement($videojuego)) {
            $videojuego->removeGenero($this);
        }

        return $this;
    }
}
