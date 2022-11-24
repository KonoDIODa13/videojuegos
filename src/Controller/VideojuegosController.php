<?php

namespace App\Controller;

use App\Repository\VideojuegoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VideojuegosController extends ControladorBase
{

    #[Route('/videojuegos', name: 'app_videojuegos')]
    public function index(VideojuegoRepository $videojuegoRepository): Response
    {
        return $this->render('videojuegos/index.html.twig', [
            'videojuego' => $videojuegoRepository->findAll(),
        ]);
    }

    #[Route('/videojuegos/{slug}', name: 'app_videojuego')]
    public function mostrarVideojuego(VideojuegoRepository $videojuegoRepository, $slug): Response
    {
        //dd($videojuegoRepository);
        $videojuego = $videojuegoRepository->findOneBy(['slug' => $slug]);
        $autores = $videojuego->getAutor();
        $generos = $videojuego->getTema();
        $desarrolladores = $videojuego->getDesarrollador();

        return $this->render('videojuegos/videojuego.html.twig', [
            'videojuego' => $videojuego,
            'slug' => $slug,
            'autores' => $autores,
            'generos' => $generos,
            'desarrolladores' => $desarrolladores,
        ]);
    }

    #[Route('/videojuegos/{slug}/lista', name: 'app_annadir_a_lista')]
    public function annadirLista(VideojuegoRepository $videojuegoRepository, EntityManagerInterface $entityManager, $slug): Response
    {
        $videojuego = $videojuegoRepository->findOneBy(['slug' => $slug]);
        $usuario = $this->getUser();
        $lista = $usuario->addVideojuego($videojuego);
        $entityManager->persist($lista);
        $entityManager->flush();
        return $this->redirectToRoute('app_perfil');
    }
}
