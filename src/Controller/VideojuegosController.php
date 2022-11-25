<?php

namespace App\Controller;

use App\Repository\VideojuegoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Videojuego;

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
    public function mostrarVideojuego(Videojuego $videojuego): Response
    {
        $autores = $videojuego->getAutor();
        $generos = $videojuego->getTema();
        $desarrolladores = $videojuego->getDesarrollador();

        return $this->render('videojuegos/videojuego.html.twig', [
            'videojuego' => $videojuego,
            'slug' => $videojuego->getSlug(),
            'autores' => $autores,
            'generos' => $generos,
            'desarrolladores' => $desarrolladores,
        ]);
    }

    #[Route('/videojuegos/{videojuego}/lista', name: 'app_annadir_a_lista')]
    public function annadirLista(EntityManagerInterface $entityManager, Videojuego $videojuego): Response
    {
        $usuario = $this->getUser();
        $lista = $usuario->addVideojuego($videojuego);
        $entityManager->persist($lista);
        $entityManager->flush();
        return $this->redirectToRoute('app_perfil');
    }
}
