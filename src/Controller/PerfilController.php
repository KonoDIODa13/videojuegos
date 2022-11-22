<?php

namespace App\Controller;

use App\Repository\ListaJuegosRepository;
use App\Repository\UsuarioRepository;
use App\Repository\VideojuegoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PerfilController extends ControladorBase
{

    #[Route('/', name: 'app_inicio')]
    public function inicio(UsuarioRepository $usuarioRepository): Response
    {
        $usuarios = $usuarioRepository->findAll();

        return $this->render('perfil/index.html.twig', [
            'usuario' => $usuarios,
        ]);
    }

    #[Route('/perfil', name: 'app_perfil')]
    public function perfil(VideojuegoRepository $videojuegoRepository, ListaJuegosRepository $listaJuegosRepository): Response
    {
        $juegos = $videojuegoRepository->findAll();
        $usuario = $this->getUser();
        $listaJuegos = $listaJuegosRepository->findBy(['usuario' => $usuario->getId()]);
        $arrComentarios = array();
        $arrJuegos = array();

        for ($i = 0; $i < count($listaJuegos); $i++) {
            if ($listaJuegos[$i] != null) {
                $juego = $listaJuegos[$i]->getVideojuego();
                array_push($arrJuegos, $juego);

                if ($listaJuegos[$i]->getComentario() != null) {
                    $comentario = $listaJuegos[$i]->getComentario();
                    array_push($arrComentarios, $comentario);
                } else {
                    array_push($arrComentarios, null);
                }
            }
        }
        dd($arrComentarios);

        return $this->render('perfil/perfil.html.twig', [
            'usuario' => $usuario,
            'nombre' => $usuario->getUsername(),
            'arrjuegos' => $arrJuegos,
            'arrComentarios' => $arrComentarios,
        ]);
    }

    #[Route('/perfil/ajustes', name: 'app_ajustes')]
    public function ajustes(): Response
    {
        return new Response('estos son los ajustes');
    }

    #[Route('/perfil/comentario', name: "app_comentario", methods: ["POST"])]
    public function comentario(ListaJuegosRepository $listaJuegosRepository, Request $request, VideojuegoRepository $videojuegoRepository, EntityManagerInterface $entityManager): Response
    {
        $comentario = $request->request->get("comentario");
        //dd($comentario);
        $slug = $request->request->get("slug");
        //dd($slug);
        $usuario = $this->getUser();
        $videojuego = $videojuegoRepository->findBy(["slug" => $slug]);
        $lista = $listaJuegosRepository->findOneBy(["usuario" => $usuario, "videojuego" => $videojuego]);
        //dd($lista);
        $lista->setComentario($comentario);
        $entityManager->flush();
        return $this->redirectToRoute("app_perfil");
    }
}
