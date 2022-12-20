<?php

namespace App\Controller;

use App\Repository\ListaJuegosRepository;
use App\Repository\VideojuegoRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BootstrapThemeController extends ControladorBase
{
    #[Route('/bootstrap', name: 'app_bootstrap_videojuegos')]
    public function ejemplo(VideojuegoRepository $videojuegoRepository): Response
    {
        return $this->render('bootstrap/videojuegos.html.twig', [
            'videojuegos' => $videojuegoRepository->findAll(),
        ]);
    }

    #[Route('/bootstrap/{slug}', name: 'app_bootstrap_juego')]
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
            $comentUserX = $UserX->getComentario();
            foreach ($listado as $lista) {
                if ($lista->getComentario() != $comentUserX) {
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
}
