<?php

namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UsuarioRepository::class)]
#[UniqueEntity(fields: ['username'], message: 'There is already an account with this username')]
class Usuario implements UserInterface, PasswordAuthenticatedUserInterface
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $username = null;

    #[ORM\Column]
    private array $roles = [];

    #[ORM\Column(length: 255)]
    private ?string $contra = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    private $plainPassword;

    #[ORM\OneToMany(mappedBy: 'usuario', targetEntity: ListaJuegos::class, orphanRemoval: true)]
    private Collection $listaJuegos;

    public function __construct()
    {
        $this->listaJuegos = new ArrayCollection();
    }


    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($plainPassword): void
    {
        $this->plainPassword = $plainPassword;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string)$this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getContra(): ?string
    {
        return $this->contra;
    }

    public function setContra(string $contra): self
    {
        $this->contra = $contra;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->contra;
    }

    public function setPassword(string $password): self
    {
        $this->contra = $password;
        return $this;
    }


    public function getAvatarUri(int $size = 32): string
    {
        return 'https://ui-avatars.com/api/?' . http_build_query([
                'name' => $this->getUsername(),
                'size' => $size,
                'background' => 'random',
            ]);
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
            $listaJuego->setUsuario($this);
        }

        return $this;
    }

    public function removeListaJuego(ListaJuegos $listaJuego): self
    {
        if ($this->listaJuegos->removeElement($listaJuego)) {
            // set the owning side to null (unless already changed)
            if ($listaJuego->getUsuario() === $this) {
                $listaJuego->setUsuario(null);
            }
        }

        return $this;
    }
}
