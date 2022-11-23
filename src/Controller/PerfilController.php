<?php

namespace App\Controller;

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
    public function perfil(VideojuegoRepository $videojuegoRepository): Response
    {
        $juegos = $videojuegoRepository->findAll();
        $usuario = $this->getUser();
        $lista = $usuario->getVideojuegos();
        
        $arrJuegos = array();

        for ($i = 0; $i < count($lista); $i++) {
            if ($lista[$i] != null) {
                $juego = $lista[$i];
                array_push($arrJuegos, $juego);
            }
        }

        return $this->render('perfil/perfil.html.twig', [
            'usuario' => $usuario,
            'nombre' => $usuario->getUsername(),
            'arrjuegos' => $arrJuegos,
        ]);
    }

    #[Route('/perfil/ajustes', name: 'app_ajustes')]
    public function ajustes(): Response
    {
        return new Response('estos son los ajustes');
    }
}
