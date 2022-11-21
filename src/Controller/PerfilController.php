<?php

namespace App\Controller;


use App\Repository\UsuarioRepository;
use App\Repository\VideojuegoRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PerfilController extends ControladorBase
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
    public function perfil(VideojuegoRepository $videojuegoRepository): Response
    {
        $usuario = $this->getUser();
        //$listaJuegos = $usuario->getListaJuegos();
        //dd($listaJuegos);
        //$juego = $usuario->getJuego();

//$juegos= $videojuegoRepository->findOneBy();
        return $this->render('perfil/perfil.html.twig', [
            'usuario' => $usuario,
            'nombre' => $usuario->getUsername(),
            //'lista' => $listaJuegos,

        ]);
    }
}
