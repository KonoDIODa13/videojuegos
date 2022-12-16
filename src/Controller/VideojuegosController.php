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

    // En esta función recogeremos todos los videojuegos de la base de datos y las mostraremos en la plantilla.

    #[Route('/videojuegos', name: 'app_videojuegos')]
    public function index(VideojuegoRepository $videojuegoRepository, EntityManagerInterface $entityManager): Response
    {
        $videojuegos =  $videojuegoRepository->findAll();
        $arrSlug = array();
        foreach ($videojuegos as  $juego) {
            $remlpazar = array(" ", ":");
            $slug = str_replace($remlpazar, "", $juego->getTitulo());
            $juego->setSlug($slug);
            $entityManager->flush();
            array_push($arrSlug, $slug);

            //dd($juego);
        }

        //dd($arrSlug);
        return $this->render('videojuegos/index.html.twig', [
            'videojuegos' => $videojuegos,
            'arrSlug' => $arrSlug,
        ]);
    }

    // Aqui recibimos por parámetro el videojuego.
    // Si el usuario no ha iniciado la sesión, solo ve los datos del videojuego. 
    // Si el usuario ha iniciado la sesión podrá ver los comentarios de otros usuarios y podra añadir dicho videojuego a su lista.
    // Si el usuario ha iniciado la sesión y dicho videojuego ya lo tiene en su lista,
    // no podrá añadirlo porque ya lo tiene añadido pero si podrá ver el comentario que el usuario ha puesto,
    // si no ha puesto comentario aun, le saldrá que no hay comentario.

    #[Route('/videojuegos/{slug}', name: 'app_videojuego')]
    public function mostrarVideojuego($slug, VideojuegoRepository $videojuegoRepository, ListaJuegosRepository $listaJuegosRepository, UsuarioRepository $usuarioRepository): Response
    {
        $videojuego = $videojuegoRepository->findOneBy(['slug' => $slug]);
        $usuario = $this->getUser();
        $mismoJuego = false;
        $arrComentarios = array();
        $comentario = null;
        if ($usuario != null) {
            $juegosLista = $listaJuegosRepository->findBy(['usuario' => $usuario->getId()]);
            $mismoJuego = false;
            $comentario = null;

            // Con este for compruebo si el videojuego que pasamos por parámetro es igual que alguno de los juegos de la lista del usuario.
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
                }
            }
        }
        $directores = $videojuego->getDirector();
        $generos = $videojuego->getGenero();
        $desarrolladores = $videojuego->getEmpresaDesarrolladora();

        return $this->render('videojuegos/videojuego.html.twig', [
            'videojuego' => $videojuego,
            'directores' => $directores,
            'generos' => $generos,
            'desarrolladores' => $desarrolladores,
            'mismoJuego' => $mismoJuego,
            'comentario' => $comentario,
            'arrComentarios' => $arrComentarios,
            'usuario' => $usuario,
        ]);
    }

    // en esta función creamos el objeto lista 

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
