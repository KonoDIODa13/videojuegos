<?php

namespace App\Controller;

use App\Entity\ListaJuegos;
use App\Repository\ListaJuegosRepository;
use App\Repository\UsuarioRepository;
use App\Repository\VideojuegoRepository;;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

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
    public function perfil(ListaJuegosRepository $listaJuegosRepository): Response
    {
        $usuario = $this->getUser();
        $listado = $listaJuegosRepository->findBy(['usuario' => $usuario->getId()]);
        return $this->render('perfil/perfil.html.twig', [
            'usuario' => $usuario,
            'nombre' => $usuario->getUsername(),
            'listado' => $listado,
        ]);
    }
    #[Route('perfil/remover_juego/{lista}', name: 'app_remover_juego_lista')]
    public function remover(ListaJuegos $lista, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($lista);
        $entityManager->flush();
        return $this->redirectToRoute('app_perfil');
    }
    #[Route('/perfil/addComentario', name: 'app_comentario')]
    public function addComentario(Request $request, ListaJuegosRepository $listaJuegosRepository, VideojuegoRepository $videojuegoRepository, EntityManagerInterface $entityManager): Response
    {
        $comentario = $request->get('comentario');
        $idVideojuego = $request->get('videojuego'); //id videojuego
        $videojuego = $videojuegoRepository->findOneBy(['id' => $idVideojuego]);
        $usuario = $this->getUser();
        $lista = $listaJuegosRepository->findOneBy(["usuario" => $usuario->getId(), 'videojuego' => $videojuego]);
        $lista->setComentario($comentario);
        $entityManager->flush();
        return $this->redirectToRoute('app_perfil');
    }
}
