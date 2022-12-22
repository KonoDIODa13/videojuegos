<?php

namespace App\Controller;

use App\Entity\ListaJuegos;
use App\Repository\VideojuegoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ListaJuegosRepository;

class VideojuegosController extends ControladorBase
{
    #[Route('/videojuegos', name: 'app_videojuegos')]
    public function mostrarJuegos(VideojuegoRepository $videojuegoRepository): Response
    {
        return $this->render('videojuegos/videojuegos.html.twig', [
            'videojuegos' => $videojuegoRepository->findAll(),
        ]);
    }

    #[Route('/videojuegos/{slug}', name: 'app_juego')]
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

        return $this->render('videojuegos/juego.html.twig', [
            'videojuego' => $videojuego,
            'usuario' => $usuario,
            'mensaje' => $mensaje,
            'comentarios' => $comentarios,
            'directores' => $directores,
            'generos' => $generos,
            'plataformas' => $plataformas,
            'desarrolladoras' => $desarrolladoras,
        ]);
    }

    #[Route('/videojuego/añadir/{slug}', name: 'app_videojuego_juego_añadir')]
    public function annadirJuego(EntityManagerInterface $entityManagerInterface, $slug, VideojuegoRepository $videojuegoRepository): Response
    {
        $usuario = $this->getUser();
        $videojuego = $videojuegoRepository->findOneBy(['slug' => $slug]);
        $lista = new ListaJuegos();
        $lista->setUsuario($usuario);
        $lista->setVideojuego($videojuego);
        $entityManagerInterface->persist($lista);
        $entityManagerInterface->flush();
        return $this->redirectToRoute('app_perfil');
    }
}
