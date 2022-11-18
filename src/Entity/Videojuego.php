<?php

namespace App\Entity;

use App\Repository\VideojuegoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation\Slug;

#[ORM\Entity(repositoryClass: VideojuegoRepository::class)]
class Videojuego
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $titulo = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $autor = [];

    #[ORM\Column(type: Types::ARRAY)]
    private array $tema = [];

    #[ORM\Column(length: 4)]
    private ?string $fechaPublicacion = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $desarrollador = [];

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descripcion = null;

    #[ORM\Column(length: 50)]
    #[Slug(fields: ['titulo'])]
    private ?string $slug = null;

    #[ORM\OneToMany(mappedBy: 'videojuego', targetEntity: ListaJuegos::class, orphanRemoval: true)]
    private Collection $listaJuegos;

    public function __construct()
    {
        $this->listaJuegos = new ArrayCollection();
    }

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

    public function getAutor(): array
    {
        return $this->autor;
    }

    public function setAutor(array $autor): self
    {
        $this->autor = $autor;

        return $this;
    }


    public function getTema(): array
    {
        return $this->tema;
    }

    public function setTema(array $tema): self
    {
        $this->tema = $tema;

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

    /**
     * @return Collection<int, ListaJuegos>
     */
    public function getListaJuegos(): Collection
    {
        return $this->listaJuegos;
    }

    public function addListaJuego(ListaJuegos $listaJuego): self
    {
        if (!$this->listaJuegos->contains($listaJuego)) {
            $this->listaJuegos->add($listaJuego);
            $listaJuego->setVideojuego($this);
        }

        return $this;
    }

    public function removeListaJuego(ListaJuegos $listaJuego): self
    {
        if ($this->listaJuegos->removeElement($listaJuego)) {
            // set the owning side to null (unless already changed)
            if ($listaJuego->getVideojuego() === $this) {
                $listaJuego->setVideojuego(null);
            }
        }

        return $this;
    }
}
