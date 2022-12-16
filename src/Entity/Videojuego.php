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

    #[ORM\OneToMany(mappedBy: 'videojuego', targetEntity: ListaJuegos::class)]
    private Collection $listaJuegos;

    #[ORM\ManyToMany(targetEntity: Director::class, inversedBy: 'videojuegos')]
    private Collection $director;

    #[ORM\ManyToMany(targetEntity: Genero::class, inversedBy: 'videojuegos')]
    private Collection $genero;

    #[ORM\ManyToMany(targetEntity: EmpresaDesarrolladora::class, inversedBy: 'videojuegos')]
    private Collection $empresaDesarrolladora;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    public function __construct()
    {
        $this->listaJuegos = new ArrayCollection();
        $this->director = new ArrayCollection();
        $this->genero = new ArrayCollection();
        $this->empresaDesarrolladora = new ArrayCollection();
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
        }

        return $this;
    }

    public function removeDirector(Director $director): self
    {
        $this->director->removeElement($director);

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
        }

        return $this;
    }

    public function removeGenero(Genero $genero): self
    {
        $this->genero->removeElement($genero);

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
        }

        return $this;
    }

    public function removeEmpresaDesarrolladora(EmpresaDesarrolladora $empresaDesarrolladora): self
    {
        $this->empresaDesarrolladora->removeElement($empresaDesarrolladora);

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }
    public function setSlug($slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function autoSlug(): self
    {
        $remlpazar = array(" ", ":");
        $slug = str_replace($remlpazar, "", $this->getTitulo());
        $this->slug = $slug;

        return $this;
    }
}
