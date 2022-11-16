<?php

namespace App\Controller;

use App\Entity\Videojuego;
use App\Repository\VideojuegoRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[IsGranted('IS_AUTHENTICATED_REMEMBERED')]
class VideojuegosController extends AbstractController
{

    #[Route('/videojuegos', name: 'app_videojuegos')]
    public function index(VideojuegoRepository $videojuegoRepository): Response
    {
        return $this->render('videojuegos/index.html.twig', [
            'videojuego' => $videojuegoRepository->findAll(),
        ]);
    }

    #[Route('/videojuegos/{titulo}', name: 'app_videojuego')]
    public function mostrarVideojuego(VideojuegoRepository $videojuegoRepository, $titulo): Response
    {
        $videojuego = $videojuegoRepository->findOneBy(['titulo' => $titulo]);
        return $this->render('videojuegos/videojuego.html.twig', [
            'videojuego' => $videojuego,
        ]);
    }


}
