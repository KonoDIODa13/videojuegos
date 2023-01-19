<?php

namespace App\Controller;

use App\Repository\VideojuegoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VideojuegosAdminController extends AbstractController
{
    #[Route('/admin/videojuegos', name: 'admin_videojuegos')]
    public function index(): Response
    {
        return $this->render('prueba/react.html.twig');
    }

    #[Route('/datos')]
    public function getDatos()
    {
        return $this->render("prueba/datos.json");
    }
    #[Route('/juegos')]
    public function getJuegos()
    {
        return $this->render("prueba/juegos.json");
    }

    #[Route('/juegos_plataformas')]
    public function getJuegosXPlataformas()
    {
        return $this->render("prueba/videojuego_plataformas.json");
    }

    #[Route('/plataformas')]
    public function getPlataformas()
    {
        return $this->render("prueba/plataformas.json");
    }

    #[Route('/mostrarDatos', name: 'uwu')]
    public function mostrarDatos(VideojuegoRepository $videojuegoRepository): Response
    {
        $videojuegos = $videojuegoRepository->findAll();
        return $this->render('prueba/juegos.html.twig', [
            "videojuegos"=>json_encode($videojuegos),
        ]);
    }
}
