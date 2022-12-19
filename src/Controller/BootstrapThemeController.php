<?php

namespace App\Controller;

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
    public function mostrarJuego(VideojuegoRepository $videojuegoRepository, $slug): Response
    {
        $videojuego = $videojuegoRepository->findOneBy(['slug' => $slug]);

        return $this->render('bootstrap/juego.html.twig', [
            'videojuego' => $videojuego,
        ]);
    }
}
