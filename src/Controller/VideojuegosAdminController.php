<?php

namespace App\Controller;

use App\Repository\GeneroRepository;
use App\Repository\PlataformaRepository;
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
    public function getPlataformas(PlataformaRepository $plataformaRepository)
    {
        $plataformas = array();
        foreach ($plataformaRepository->findAll() as $array) {
            $id = $array->getId();
            $plataforma = $array->getPlataforma();
            array_push($plataformas, ["id" => $id, "plataforma" => $plataforma]);
        }
        return $this->json($plataformas);
    }

    #[Route('/generos')]
    public function getGeneros(GeneroRepository $generoRepository)
    {
        $generos = array();
        foreach ($generoRepository->findAll() as $array) {
            $id = $array->getId();
            $genero = $array->getGenero();
            array_push($generos, ["id" => $id, "genero" => $genero]);
        }
        return $this->json($generos);
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
                    "directores" => $directores,
                    "generos" => $generos,
                    "fechaPublicacion" => $fechaPublicacion,
                    "desarrolladoras" => $empresaDesarrolladoras,
                    "plataformas" => $plataformas,
                    "slug" => $slug,
                ]
            );
        }
        return $this->json($juegos);
    }

    #[Route("/admin/juego/{slug}")]
    function mostrarJuego($slug)
    {
        return $this->render("prueba/games.html.twig");
    }
}
