<?php

namespace App\Controller;

use App\Entity\ListaJuegos;
use App\Entity\Videojuego;
use App\Repository\ListaJuegosRepository;
use App\Repository\UsuarioRepository;
use App\Repository\VideojuegoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Form\ComentarioFormType;

class BootstrapThemeController extends ControladorBase
{
    #[Route('/bootstrap', name: 'app_bootstrap')]
    public function mostrarBootstrap(): Response
    {
        return $this->render('bootstrap/inicio.html.twig');
    }

    #[Route('/bootstrap/videojuegos', name: 'app_bootstrap_videojuegos')]
    public function mostrarJuegos(VideojuegoRepository $videojuegoRepository): Response
    {
        return $this->render('bootstrap/videojuegos.html.twig', [
            'videojuegos' => $videojuegoRepository->findAll(),
        ]);
    }

    #[Route('/bootstrap/videojuegos/{slug}', name: 'app_bootstrap_juego')]
    public function mostrarJuego(VideojuegoRepository $videojuegoRepository, $slug, ListaJuegosRepository $listaJuegosRepository): Response
    {
        $videojuego = $videojuegoRepository->findOneBy(['slug' => $slug]);
        $usuario = $this->getUser();
        $mensaje = null;
        $comentarios = array();

        if ($usuario != null) {
            $lista = $listaJuegosRepository->findBy(['usuario' => $usuario]);
            foreach ($lista as $juego) {
                if ($juego->getVideojuego() == $videojuego) {
                    $mensaje = "Este videojuego ya esta en la lista";
                }
            }
            $listado = $listaJuegosRepository->findBy(['videojuego' => $videojuego]);
            $UserX = $listaJuegosRepository->findOneBy(['usuario' => $usuario, 'videojuego' => $videojuego]);
            foreach ($listado as $lista) {
                if ($UserX == null) {
                    $comentario = "Aun no hay comentario";
                } else {
                    $comentario = $UserX->getComentario();
                }
                if ($lista->getComentario() != $comentario) {
                    $array = (["usuario" => $lista->getUsuario(), "comentario" => $lista->getComentario()]);
                    array_push($comentarios, $array);
                }
            }
        }
        return $this->render('bootstrap/juego.html.twig', [
            'videojuego' => $videojuego,
            'usuario' => $usuario,
            'mensaje' => $mensaje,
            'comentarios' => $comentarios,
        ]);
    }
    #[Route('/bootstrap/iniciar_sesion', name: 'app_bootstrap_inicio_sesion')]
    public function inicioSesion(AuthenticationUtils $authenticationUtils): Response
    {
        return $this->render('bootstrap/iniciarSesion.html.twig', [
            'error' => $authenticationUtils->getLastAuthenticationError(),
        ]);
    }

    #[Route('/bootstrap/perfil', name: 'app_bootstrap_perfil')]
    public function mostrarPerfil(ListaJuegosRepository $listaJuegosRepository, VideojuegoRepository $videojuegoRepository): Response
    {
        $usuario = $this->getUser();
        $listado = $listaJuegosRepository->findBy(['usuario' => $usuario]);
        foreach ($listado as $lista) {
            $videojuegoRepository->findBy(['id' => $lista->getVideojuego()]);
            //dd($lista->getId());
        }
        return $this->render('bootstrap/perfil.html.twig', [
            'listado' => $listado,
        ]);
    }

    #[Route('/bootstrap/videojuego/añadir/{slug}', name: 'app_bootstrap_videojuego_juego_añadir')]
    public function annadirJuego(EntityManagerInterface $entityManagerInterface, $slug, VideojuegoRepository $videojuegoRepository): Response
    {
        $usuario = $this->getUser();
        $videojuego = $videojuegoRepository->findOneBy(['slug' => $slug]);
        $lista = new ListaJuegos();
        $lista->setUsuario($usuario);
        $lista->setVideojuego($videojuego);
        $entityManagerInterface->persist($lista);
        $entityManagerInterface->flush();
        return $this->redirectToRoute('app_bootstrap_perfil');
    }

    #[Route('/bootstrap/perfil/eliminar/{lista}', name: 'app_bootstrap_perfil_elminar')]
    public function eliminar($lista, ListaJuegosRepository $listaJuegosRepository, EntityManagerInterface $entityManagerInterface): Response
    {
        $eliminarLista = $listaJuegosRepository->findOneBy(['id' => $lista]);
        $entityManagerInterface->remove($eliminarLista);
        $entityManagerInterface->flush();
        return $this->redirectToRoute('app_bootstrap_perfil');
    }

    #[Route('/bootstrap/perfil/{lista}/añadirComentario', name: 'app_bootstrap_perfil_añadir_comentario')]
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
        return $this->render('bootstrap/annadirComentario.html.twig', [
            'comentarioForm' => $form->createView(),
            'videojuego' => $videojuego,
        ]);
    }

    #[Route('/bootstrap/perfil/{lista}/eliminarComentario', name: 'app_bootstrap_perfil_eliminar_comentario')]
    public function eliminarComentario(ListaJuegos $lista, EntityManagerInterface $entityManagerInterface): Response
    {
        $lista->eliminarComentario();
        $entityManagerInterface->flush();
        return $this->redirectToRoute('app_bootstrap_perfil');
    }
}
