<?php

namespace App\Controller;

use App\Entity\ListaJuegos;
use App\Entity\Videojuego;
use App\Repository\ListaJuegosRepository;
use App\Repository\UsuarioRepository;
use App\Repository\VideojuegoRepository;
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
    public function perfil(VideojuegoRepository $videojuegoRepository, ListaJuegosRepository $listaJuegosRepository): Response
    {
        $usuario = $this->getUser();

        $listado = $listaJuegosRepository->findBy(['usuario' => $usuario->getId()]);
        $arrJuegos = array();

        for ($i = 0; $i < count($listado); $i++) {
            $lista = $listado[$i];
            if ($lista != null) {
                $juego = $videojuegoRepository->findOneBy(['id' => $lista->getVideojuego()]);

                array_push($arrJuegos, $juego);
            }
        }


        return $this->render('perfil/perfil.html.twig', [
            'usuario' => $usuario,
            'nombre' => $usuario->getUsername(),
            'arrjuegos' => $arrJuegos,
        ]);
    }
    #[Route('perfil/remover_juego/{videojuego}', name: 'app_remover_juego_lista')]
    public function remover(Videojuego $videojuego, EntityManagerInterface $entityManager, ListaJuegosRepository $listaJuegosRepository): Response
    {
        $usuario = $this->getUser();
        $lista = $listaJuegosRepository->findOneBy(["usuario" => $usuario->getId(), "videojuego" => $videojuego]);
        $entityManager->remove($lista);
        $entityManager->flush();
        return $this->redirectToRoute('app_perfil');
    }
}
