<?php

namespace App\Controller;

use App\Entity\Usuario;
use App\Repository\UsuarioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class PerfilController extends AbstractController
{

    private Security $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    #[Route('/', name: 'app_inicio')]
    public function inicio(UsuarioRepository $usuarioRepository): Response
    {
        $usuarios = $usuarioRepository->findAll();


        return $this->render('perfil/index.html.twig', [
            'usuario' => $usuarios,
        ]);
    }

    #[Route('/perfil', name: 'app_perfil')]
    public function perfil(UserInterface $usuario): Response
    {
        //$usuario = $usuarioRepository->findOneBy(['username' => $nombreUsuario]);
        //dd($this->security->getUser());

        return $this->render('perfil/perfil.html.twig', [
            'nombre' => $usuario->getUsername(),
        ]);
    }

    #[
        Route('/registrarse', name: 'app_registro')]
    public function registro(AuthenticationUtils $authenticationUtils): Response
    {
        return $this->render('perfil/registro.html.twig', [
            'error' => $authenticationUtils->getLastAuthenticationError(),
            'last_username' => $authenticationUtils->getLastUsername(),
        ]);
    }

    #[Route('iniciar_sesion', name: 'app_inicio_sesion')]
    public function inicioSesion(AuthenticationUtils $authenticationUtils): Response
    {
        return $this->render('perfil/inicio_sesion.html.twig', [
            'error' => $authenticationUtils->getLastAuthenticationError(),
            'last_username' => $authenticationUtils->getLastUsername(),
        ]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
