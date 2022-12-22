<?php

namespace App\Controller;

use App\Entity\ListaJuegos;
use App\Form\ComentarioFormType;
use App\Repository\ListaJuegosRepository;
use App\Repository\UsuarioRepository;
use App\Repository\VideojuegoRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class PerfilController extends ControladorBase
{

    #[Route('/', name: 'app_inicio')]
    public function inicio(UsuarioRepository $usuarioRepository): Response
    {
        $mensaje = null;
        if (isset($_SESSION)) {
            session_abort();
        } else {
            session_start();
        }

        if (isset($_SESSION['mensaje'])) {
            $mensaje = $_SESSION['mensaje'];
        }

        session_abort();
        $usuarios = $usuarioRepository->findAll();
        return $this->render('perfil/index.html.twig', [
            'usuario' => $usuarios,
            'mensaje' => $mensaje,
        ]);
    }

    #[Route('/perfil', name: 'app_perfil')]
    public function mostrarPerfil(ListaJuegosRepository $listaJuegosRepository, VideojuegoRepository $videojuegoRepository): Response
    {
        $usuario = $this->getUser();
        $listado = $listaJuegosRepository->findBy(['usuario' => $usuario]);
        foreach ($listado as $lista) {
            $videojuegoRepository->findBy(['id' => $lista->getVideojuego()]);
        }
        return $this->render('perfil/perfil.html.twig', [
            'listado' => $listado,
        ]);
    }

    #[Route('/perfil/eliminar/{lista}', name: 'app_perfil_elminar')]
    public function eliminar($lista, ListaJuegosRepository $listaJuegosRepository, EntityManagerInterface $entityManagerInterface): Response
    {
        $eliminarLista = $listaJuegosRepository->findOneBy(['id' => $lista]);
        $entityManagerInterface->remove($eliminarLista);
        $entityManagerInterface->flush();
        return $this->redirectToRoute('app_perfil');
    }

    #[Route('/perfil/{lista}/añadirComentario', name: 'app_perfil_añadir_comentario')]
    public function annadirComentario(listaJuegos $lista, VideojuegoRepository $videojuegoRepository, Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        $videojuego = $videojuegoRepository->findOneBy(['id' => $lista->getVideojuego()]);
        $form = $this->createForm(ComentarioFormType::class, $lista);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comentario = $form->get('comentario')->getData();
            $lista->setComentario($comentario);
            $entityManagerInterface->persist($lista);
            $entityManagerInterface->flush();
            return $this->redirectToRoute('app_bootstrap_perfil');
        }
        return $this->render('perfil/annadirComentario.html.twig', [
            'comentarioForm' => $form->createView(),
            'videojuego' => $videojuego,
        ]);
    }

    #[Route('/perfil/{lista}/modificarComentario', name: 'app_perfil_modificar_comentario')]
    public function modificarComentario(listaJuegos $lista, VideojuegoRepository $videojuegoRepository, Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        $videojuego = $videojuegoRepository->findOneBy(['id' => $lista->getVideojuego()]);
        $form = $this->createForm(ComentarioFormType::class, $lista);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comentario = $form->get('comentario')->getData();
            $lista->setComentario($comentario);
            $entityManagerInterface->persist($lista);
            $entityManagerInterface->flush();
            return $this->redirectToRoute('app_bootstrap_perfil');
        }
        return $this->render('perfil/modificarComentario.html.twig', [
            'comentarioForm' => $form->createView(),
            'videojuego' => $videojuego,
        ]);
    }

    #[Route('/perfil/{lista}/eliminarComentario', name: 'app_perfil_eliminar_comentario')]
    public function eliminarComentario(ListaJuegos $lista, EntityManagerInterface $entityManagerInterface): Response
    {
        $lista->eliminarComentario();
        $entityManagerInterface->flush();
        return $this->redirectToRoute('app_perfil');
    }

    #[Route('/perfil/ajustes', name: 'app_perfil_ajustes')]
    public function ajustes(EntityManagerInterface $entityManagerInterface): Response
    {
        $usuario = $this->getUser();
        return $this->render('perfil/ajustes.html.twig', [
            'usuario' => $usuario,
        ]);
    }
}
