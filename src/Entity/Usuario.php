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
#[UniqueEntity(fields: ['username'], message: '')]
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
    private ?string $password = null;

    #[ORM\OneToMany(mappedBy: 'usuario', targetEntity: ListaJuegos::class)]
    private Collection $listaJuegos;

    #[ORM\Column(length: 100)]
    private ?string $plainPassword = null;

    private string $contra;

    public function __construct()
    {
        $this->listaJuegos = new ArrayCollection();
    }

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

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->contra = $password;
        $this->password = password_hash($password, null);
        //$this->setPlainPassword($password);
        return $this;
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
        return $this->getUsername();
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
            if ($listaJuego->getUsuario() === $this) {
                $listaJuego->setUsuario(null);
            }
        }

        return $this;
    }

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    public function getDato()
    {
        return $this->contra;
    }
}
