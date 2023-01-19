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
        $juegos = array();
        foreach ($videojuegos as $juego) {
            $id = $juego->getId();
            $titulo = $juego->getTitulo();
            $fechaPublicacion = $juego->getFechaPublicacion();
            $slug = $juego->getSlug();

            $plataformas = array();
            foreach ($juego->getPlataforma() as $platforms) {
                $plataforma = $platforms->getPlataforma();
                array_push($plataformas, $plataforma);
            }

            $directores = array();
            foreach ($juego->getDirector() as $directors) {
                $director = $directors->getNombre();
                array_push($directores, $director);
            }

            $generos = array();
            foreach ($juego->getGenero() as $genres) {
                $genero = $genres->getGenero();
                array_push($generos, $genero);
            }

            $empresaDesarrolladoras = array();
            foreach ($juego->getEmpresaDesarrolladora() as $developers) {
                $desarrollador = $developers->getDesarrolladora();
                array_push($empresaDesarrolladoras, $desarrollador);
            }

            array_push(
                $juegos,
                [
                    "id" => $id,
                    "titulo" => $titulo,
                    "fechaPublicacion" => $fechaPublicacion,
                    "slug" => $slug,
                    "plataformas" => $plataformas,
                    "directores" => $directores,
                    "generos" => $generos,
                    "desarrolladoras" => $empresaDesarrolladoras
                ]
            );
        }

        return $this->json($juegos);
    }
}
