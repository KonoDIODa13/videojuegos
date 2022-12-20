<?php

namespace App\Controller;

use App\Repository\ListaJuegosRepository;
use App\Repository\VideojuegoRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class BootstrapThemeController extends ControladorBase
{
    #[Route('/bootstrap', name: 'app_bootstrap')]
    public function mostrarBootstrap(): Response
    {
        return $this->render('bootstrap/inicio.html.twig');
    }

    #[Route('/bootstrap/videojuegos', name: 'app_bootstrap_videojuegos')]
    public function mostrarJuegos(VideojuegoRepository $videojuegoRepository): Response
    {
        return $this->render('bootstrap/videojuegos.html.twig', [
            'videojuegos' => $videojuegoRepository->findAll(),
        ]);
    }

    #[Route('/bootstrap/videojuegos{slug}', name: 'app_bootstrap_juego')]
    public function mostrarJuego(VideojuegoRepository $videojuegoRepository, $slug, ListaJuegosRepository $listaJuegosRepository): Response
    {
        $videojuego = $videojuegoRepository->findOneBy(['slug' => $slug]);
        $usuario = $this->getUser();
        $mensaje = null;
        $comentarios = array();

        if ($usuario != null) {
            $lista = $listaJuegosRepository->findBy(['usuario' => $usuario]);
            foreach ($lista as $juego) {
                if ($juego->getVideojuego() == $videojuego) {
                    $mensaje = "Este videojuego ya esta en la lista";
                }
            }
        }
        if ($usuario != null) {
            $listado = $listaJuegosRepository->findBy(['videojuego' => $videojuego]);
            $UserX = $listaJuegosRepository->findOneBy(['usuario' => $usuario, 'videojuego' => $videojuego]);
            foreach ($listado as $lista) {
                if ($lista->getComentario() != $UserX->getComentario()) {
                    $array = (["usuario" => $lista->getUsuario(), "comentario" => $lista->getComentario()]);
                    array_push($comentarios, $array);
                }
            }
        }

        return $this->render('bootstrap/juego.html.twig', [
            'videojuego' => $videojuego,
            'usuario' => $usuario,
            'mensaje' => $mensaje,
            'comentarios' => $comentarios,
        ]);
    }
    #[Route('/bootstrap/iniciar_sesion', name: 'app_bootstrap_inicio_sesion')]
    public function inicioSesion(AuthenticationUtils $authenticationUtils): Response
    {
        return $this->render('bootstrap/iniciarSesion.html.twig', [
            'error' => $authenticationUtils->getLastAuthenticationError(),
        ]);
    }

    #[Route('/bootstrap/perfil', name: 'app_bootstrap_perfil')]
    public function mostrarPerfil(ListaJuegosRepository $listaJuegosRepository, VideojuegoRepository $videojuegoRepository): Response
    {
        $usuario = $this->getUser();
        $listado = $listaJuegosRepository->findBy(['usuario' => $usuario]);
        foreach ($listado as $lista) {
            $videojuegoRepository->findBy(['id' => $lista->getVideojuego()]);
        }

        //dd($listado);
        return $this->render('bootstrap/perfil.html.twig', [
            'listado' => $listado,
        ]);
    }
}
