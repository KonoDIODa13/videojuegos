<?php

namespace App\Controller;

use App\Entity\Videojuego;
use App\Repository\UsuarioRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

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
    public function perfil(): Response
    {
        $usuario = $this->getUser();
        $lista = $usuario->getVideojuegos();
        $arrJuegos = array();
        for ($i = 0; $i < count($lista); $i++) {
            if ($lista[$i] != null) {
                $juego = $lista[$i];
                array_push($arrJuegos, $juego);
            }
        }

    dd($arrJuegos);

        return $this->render('perfil/perfil.html.twig', [
            'usuario' => $usuario,
            'nombre' => $usuario->getUsername(),
            'arrjuegos' => $arrJuegos,
        ]);
    }
    #[Route('perfil/remover_juego/{videojuego}', name: 'app_remover_juego_lista')]
    public function remover(Videojuego $videojuego, EntityManagerInterface $entityManager): Response
    {
        $usuario = $this->getUser();
        $usuario->removeVideojuego($videojuego);
        $entityManager->flush();
        return $this->redirectToRoute('app_perfil');
    }
}
