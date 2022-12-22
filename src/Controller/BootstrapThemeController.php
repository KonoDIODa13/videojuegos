<?php

namespace App\Controller;

use App\Repository\ListaJuegosRepository;
use App\Repository\VideojuegoRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BootstrapThemeController extends ControladorBase
{
    #[Route('/bootstrap', name: 'app_bootstrap')]
    public function mostrarBootstrap(): Response
    {
        return $this->render('bootstrap/inicio.html.twig');
    }
    #[Route('/bootstrap/{slug}', name: 'app_juegov2')]
    public function mostrarJuego($slug, VideojuegoRepository $videojuegoRepository, ListaJuegosRepository $listaJuegosRepository): Response
    {
        $usuario = $this->getUser();
        $videojuego = $videojuegoRepository->findOneBy(['slug' => $slug]);
        $mensaje = null;
        $comentarios = array();

        if ($usuario != null) {
            $lista = $listaJuegosRepository->findBy(['usuario' => $usuario]);
            foreach ($lista as $juego) {
                if ($juego->getVideojuego() == $videojuego) {
                    $mensaje = "Este videojuego ya esta en la lista";
                }
            }
            $listado = $listaJuegosRepository->findBy(['videojuego' => $videojuego]);
            $UserX = $listaJuegosRepository->findOneBy(['usuario' => $usuario, 'videojuego' => $videojuego]);
            foreach ($listado as $lista) {
                if ($UserX == null) {
                    $comentario = "Aun no hay comentario";
                } else {
                    $comentario = $UserX->getComentario();
                }
                if ($lista->getComentario() != $comentario) {
                    $array = (["usuario" => $lista->getUsuario(), "comentario" => $lista->getComentario()]);
                    array_push($comentarios, $array);
                }
            }
        }

        $directores = $videojuego->getDirector()->toArray();
        $generos = $videojuego->getGenero()->toArray();
        $plataformas = $videojuego->getPlataforma()->toArray();
        $desarrolladoras = $videojuego->getEmpresaDesarrolladora()->toArray();

        return $this->render('bootstrap/juegov2.html.twig', [
            'videojuego' => $videojuego,
            'directores' => $directores,
            'generos' => $generos,
            'plataformas' => $plataformas,
            'desarrolladoras' => $desarrolladoras,
            'usuario' => $usuario,
            'comentarios' => $comentarios,
            'mensaje' => $mensaje,
        ]);
    }

    #[Route('/prueba', name: 'prueba')]
    public function prueba(): Response
    {
        return $this->render('bootstrap/prueba.html.twig');
    }
}
