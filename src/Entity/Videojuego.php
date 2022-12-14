<?php

namespace App\Entity;

use App\Repository\VideojuegoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: VideojuegoRepository::class)]
class Videojuego
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $titulo = null;

    #[ORM\Column(length: 4)]
    private ?string $fechaPublicacion = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descripcion = null;

    #[ORM\OneToMany(mappedBy: 'videojuego', targetEntity: Director::class)]
    private Collection $director;

    #[ORM\OneToMany(mappedBy: 'videojuego', targetEntity: Genero::class)]
    private Collection $genero;

    #[ORM\OneToMany(mappedBy: 'videojuego', targetEntity: EmpresaDesarrolladora::class)]
    private Collection $empresaDesarrolladora;

    #[ORM\OneToMany(mappedBy: 'videojuego', targetEntity: ListaJuegos::class)]
    private Collection $listaJuegos;

    public function __construct()
    {
        $this->director = new ArrayCollection();

        $this->genero = new ArrayCollection();

        $this->empresaDesarrolladora = new ArrayCollection();

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

    public function getFechaPublicacion(): ?string
    {
        return $this->fechaPublicacion;
    }

    public function setFechaPublicacion(string $fechaPublicacion): self
    {
        $this->fechaPublicacion = $fechaPublicacion;

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

    public function __toString(): string
    {
        return $this->getTitulo();
    }

    /**
     * @return Collection<int, Director>
     */
    public function getDirector(): Collection
    {
        return $this->director;
    }

    public function addDirector(Director $director): self
    {
        if (!$this->director->contains($director)) {
            $this->director->add($director);
            $director->setVideojuego($this);
        }

        return $this;
    }

    public function removeDirector(Director $director): self
    {
        if ($this->director->removeElement($director)) {
            if ($director->getVideojuego() === $this) {
                $director->setVideojuego(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Genero>
     */
    public function getGenero(): Collection
    {
        return $this->genero;
    }

    public function addGenero(Genero $genero): self
    {
        if (!$this->genero->contains($genero)) {
            $this->genero->add($genero);
            $genero->setVideojuego($this);
        }

        return $this;
    }

    public function removeGenero(Genero $genero): self
    {
        if ($this->genero->removeElement($genero)) {
            if ($genero->getVideojuego() === $this) {
                $genero->setVideojuego(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, EmpresaDesarrolladora>
     */
    public function getEmpresaDesarrolladora(): Collection
    {
        return $this->empresaDesarrolladora;
    }

    public function addEmpresaDesarrolladora(EmpresaDesarrolladora $empresaDesarrolladora): self
    {
        if (!$this->empresaDesarrolladora->contains($empresaDesarrolladora)) {
            $this->empresaDesarrolladora->add($empresaDesarrolladora);
            $empresaDesarrolladora->setVideojuego($this);
        }

        return $this;
    }

    public function removeEmpresaDesarrolladora(EmpresaDesarrolladora $empresaDesarrolladora): self
    {
        if ($this->empresaDesarrolladora->removeElement($empresaDesarrolladora)) {
            if ($empresaDesarrolladora->getVideojuego() === $this) {
                $empresaDesarrolladora->setVideojuego(null);
            }
        }

        return $this;
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
            if ($listaJuego->getVideojuego() === $this) {
                $listaJuego->setVideojuego(null);
            }
        }

        return $this;
    }
}
