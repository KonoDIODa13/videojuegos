<?php

namespace App\Entity;

use App\Repository\PlataformaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlataformaRepository::class)]
class Plataforma
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $plataforma = null;

    #[ORM\ManyToMany(targetEntity: Videojuego::class, mappedBy: 'plataforma')]
    private Collection $videojuegos;

    public function __construct()
    {
        $this->videojuegos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlataforma(): ?string
    {
        return $this->plataforma;
    }

    public function setPlataforma(string $plataforma): self
    {
        $this->plataforma = $plataforma;

        return $this;
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
            $videojuego->addPlataforma($this);
        }

        return $this;
    }

    public function removeVideojuego(Videojuego $videojuego): self
    {
        if ($this->videojuegos->removeElement($videojuego)) {
            $videojuego->removePlataforma($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getPlataforma();
    }
}
