<?php

namespace App\Controller;

use App\Entity\ListaJuegos;
use App\Repository\VideojuegoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Videojuego;
use App\Repository\ListaJuegosRepository;

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
    public function mostrarVideojuego(Videojuego $videojuego, ListaJuegosRepository $listaJuegosRepository): Response
    {
        $usuario = $this->getUser();
        $mismoJuego = false;

        if ($usuario != null) {
            $juegosLista = $listaJuegosRepository->findBy(['usuario' => $usuario->getId()]);
            $mismoJuego = false;
            foreach ($juegosLista as $juego) {

                if ($juego->getVideojuego() == $videojuego) {
                    $mismoJuego = true;
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
