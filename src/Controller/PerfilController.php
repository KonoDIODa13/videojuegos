<?php

namespace App\Controller;


use App\Repository\ListaJuegosRepository;
use App\Repository\UsuarioRepository;
use App\Repository\VideojuegoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class PerfilController extends AbstractController
{

    #[Route('/', name: 'app_inicio')]
    public function inicio(UsuarioRepository $usuarioRepository): Response
    {
        $usuarios = $usuarioRepository->findAll();

        return $this->render('perfil/index.html.twig', [
            'usuario' => $usuarios,
        ]);
    }

    #[Route('/perfil', name: 'app_perfil')]
    public function perfil(UserInterface $usuario, ListaJuegosRepository $listaJuegosRepository, VideojuegoRepository $videojuegoRepository): Response
    {
        $juego = $videojuegoRepository->findOneBy(['id' => 5]);
        $lista = $listaJuegosRepository->findBy(['usuario' => $usuario->getId(), 'videojuego' => $juego]);
        //dd($lista);

        return $this->render('perfil/perfil.html.twig', [
            'nombre' => $usuario->getUsername(),
            'lista' => $lista,
        ]);
    }
}
