<?php

namespace App\Controller;

use App\Entity\ListaJuegos;
use App\Repository\VideojuegoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Videojuego;
use App\Repository\ListaJuegosRepository;
use App\Repository\UsuarioRepository;

class VideojuegosController extends ControladorBase
{

    #[Route('/videojuegos', name: 'app_videojuegos')]
    public function index(VideojuegoRepository $videojuegoRepository): Response
    {
        return $this->render('videojuegos/index.html.twig', [
            'videojuegos' => $videojuegoRepository->findAll(),
        ]);
    }

    #[Route('/videojuegos/{videojuego}', name: 'app_videojuego')]
    public function mostrarVideojuego(Videojuego $videojuego, ListaJuegosRepository $listaJuegosRepository, UsuarioRepository $usuarioRepository): Response
    {
        $usuario = $this->getUser();
        $mismoJuego = false;
        $arrComentarios = array();
        $comentario = null;
        $foto = str_replace(" ", "", $videojuego->getTitulo());
        if ($usuario != null) {
            $juegosLista = $listaJuegosRepository->findBy(['usuario' => $usuario->getId()]);
            $mismoJuego = false;
            $comentario = null;

            foreach ($juegosLista as $juego) {

                if ($juego->getVideojuego() == $videojuego) {
                    $comentario = $juego->getComentario();
                    $mismoJuego = true;
                }
            }

            $listas = $listaJuegosRepository->findBy(['videojuego' => $videojuego]);
            $usuarios = $usuarioRepository->findAll();
            foreach ($listas as $lista) {
                if ($lista->getComentario() != null) {

                    if ($lista->getComentario() != $comentario) {
                        $array = ['usuario' => $lista->getUsuario(), 'comentario' => $lista->getComentario()];
                        array_push($arrComentarios, $array);
                    }
                } else {
                    $array = ['usuario' => $lista->getUsuario(), 'comentario' => 'no hay comentario aun'];
                    array_push($arrComentarios, $array);
                }
            }
        }
        $directores = $videojuego->getDirector();
        $generos = $videojuego->getGenero();
        $desarrolladores = $videojuego->getEmpresaDesarrolladora();

        //dd($foto);
        return $this->render('videojuegos/videojuego.html.twig', [
            'videojuego' => $videojuego,
            'directores' => $directores,
            'generos' => $generos,
            'desarrolladores' => $desarrolladores,
            'mismoJuego' => $mismoJuego,
            'comentario' => $comentario,
            'arrComentarios' => $arrComentarios,
            'usuario' => $usuario,
            'foto' => $foto,
        ]);
    }

    #[Route('/videojuegos/{videojuego}/lista', name: 'app_annadir_a_lista')]
    public function annadirLista(EntityManagerInterface $entityManager, Videojuego $videojuego): Response
    {
        $usuario = $this->getUser();

        $lista = new ListaJuegos();
        $lista->setUsuario($usuario);
        $lista->setVideojuego($videojuego);

        $entityManager->persist($lista);
        $entityManager->flush();
        return $this->redirectToRoute('app_perfil');
    }
}
