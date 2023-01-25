<?php

namespace App\Controller;

use App\Repository\DirectorRepository;
use App\Repository\EmpresaDesarrolladoraRepository;
use App\Repository\GeneroRepository;
use App\Repository\PlataformaRepository;
use App\Repository\VideojuegoRepository;
use Doctrine\ORM\Mapping\Id;
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
        return $this->render("jsons/datos.json");
    }
    #[Route('/juegos')]
    public function getJuegos()
    {
        return $this->render("jsons/juegos.json");
    }

    #[Route('/directores')]
    public function getDirectores(DirectorRepository $directorRepository)
    {
        $directores = array();
        foreach ($directorRepository->findAll() as $array) {
            $id = $array->getId();
            $director = $array->getNombre();
            array_push($directores, ["id" => $id, "director" => $director]);
        }
        return $this->json($directores);
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
    #[Route("/desarrolladoras")]
    public function getdesarrolladora(EmpresaDesarrolladoraRepository $empresaDesarrolladoraRepository)
    {
        $desarrolladoras = array();
        foreach ($empresaDesarrolladoraRepository->findAll() as $array) {
            $id = $array->getId();
            $desarrolladora = $array->getDesarrolladora();
            array_push($desarrolladoras, ["id" => $id, "desarrolladora" => $desarrolladora]);
        }
        return $this->json($desarrolladoras);
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

    #[Route('/juegos_directores')]
    public function getJuegosXDirectores()
    {
        return $this->render("jsons/videojuego_directores.json");
    }

    #[Route("/juegos_generos")]
    public function getJuegosXGeneros()
    {
        return $this->render("jsons/videojuego_generos.json");
    }

    #[Route("/juegos_desarrolladoras")]
    public function getJuegosXDesarrolladoras()
    {
        return $this->render("jsons/videojuego_desarrolladoras.json");
    }

    #[Route('/juegos_plataformas')]
    public function getJuegosXPlataformas()
    {
        return $this->render("jsons/videojuego_plataformas.json");
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

            $plataformas = array();
            foreach ($juego->getPlataforma() as $platforms) {
                $plataforma = $platforms->getPlataforma();
                array_push($plataformas, $plataforma);
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
    function mostrarJuego()
    {
        return $this->render("prueba/games.html.twig");
    }
    #[Route("/admin/director/{director}")]
    function mostrarDirector()
    {
        return $this->render("prueba/director.html.twig");
    }

    #[Route("/admin/genero/{genero}")]
    function mostrarGenero()
    {
        return $this->render("prueba/genero.html.twig");
    }

    #[Route("/admin/desarrolladora/{desarrolladora}")]
    function mostrarDesarrolladora()
    {
        return $this->render("prueba/desarrolladora.html.twig");
    }

    #[Route("/admin/plataforma/{plataforma}")]
    function mostrarPlataforma()
    {
        return $this->render("prueba/plataforma.html.twig");
    }

    #[Route("/admin/foto/{foto}")]
    function mostrarFoto($foto)
    {
        dd($foto);
        return $this->render("prueba/foto.html.twig", [
            "foto" => $foto,
        ]);
    }
}
