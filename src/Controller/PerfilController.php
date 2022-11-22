<?php

namespace App\Controller;


use App\Repository\UsuarioRepository;
use App\Repository\VideojuegoRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
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

        $usuario = $this->getUser();
       /* $listaJuegos = $usuario->getListaJuegos();
        $primerJuego = $listaJuegos[0];
        $segundoJuego = $listaJuegos[1];
        $juego1 = $videojuegoRepository->findOneBy(['id' => $primerJuego]);
        $juego2 = $videojuegoRepository->findOneBy(['id' => $segundoJuego]);

        if ($segundoJuego != null) {
            $arrJuegos = array($juego1, $juego2);
        } else {
            $arrJuegos = array($juego1);
        }*/

        return $this->render('perfil/perfil.html.twig', [
            'usuario' => $usuario,
            'nombre' => $usuario->getUsername(),
            //'arrjuegos' => $arrJuegos,
        ]);
    }

    #[Route('/perfil/ajustes', name: 'app_ajustes')]
    public function ajustes(): Response
    {
        return new Response('estos son los ajustes');
    }
}
