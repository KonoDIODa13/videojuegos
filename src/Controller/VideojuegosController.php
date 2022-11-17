<?php

namespace App\Controller;

use App\Repository\VideojuegoRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[IsGranted('IS_FULLY_AUTHENTICATED')]
class VideojuegosController extends AbstractController
{

    #[Route('/videojuegos', name: 'app_videojuegos')]
    #[IsGranted('ROLE_USER')]
    public function index(VideojuegoRepository $videojuegoRepository): Response
    {
        return $this->render('videojuegos/index.html.twig', [
            'videojuego' => $videojuegoRepository->findAll(),
        ]);
    }

    #[Route('/videojuegos/{slug}', name: 'app_videojuego')]
    public function mostrarVideojuego(VideojuegoRepository $videojuegoRepository, $slug): Response
    {
        $videojuego = $videojuegoRepository->findOneBy(['slug' => $slug]);
        return $this->render('videojuegos/videojuego.html.twig', [
            'videojuego' => $videojuego,
        ]);
    }
}
