<?php

namespace App\Controller;

use App\Entity\ListaJuegos;
use App\Repository\ListaJuegosRepository;
use App\Repository\UsuarioRepository;
use App\Repository\VideojuegoRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class PerfilController extends ControladorBase
{
    // Esta función nos controla lo que se muestra al inicio del programa.
    // Al principio, cierro la sesión porque symfony inicia la sesión sin que yo se lo pida.
    // De primeras no nos mostrará el mensaje, solo lo muestra cuando venimos del registro.
    // Los Repository son aquellas clases que estan relaccionadas con las entidades,
    // dicha clase, nos permite recoger los datos que haya en la base de datos de dicha entidad
    // Por ultimo cerramos la sesión porque ya no la vamos a utilizar y enviamos los datos a la plantilla.

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

    // Esta función controla una vez que nos hemos registrado. 
    // En ella, conseguimos el usuario y la lista en funcion de su id.
    // Dicha lista contiene todos los juegos que el usuario agregó y los comentarios si esque puso alguno.
    // Por último le pasamos los datos a la plantilla.

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

    // En esta función, lo que recibimos por parámetro es una lista que contiene el id del usuario, el id del videojuego y el comentario si esque lo tiene.
    // en este método se utiliza el Entity Manager que es la interfaz que tiene symfony para crear, borrar y editar.
    // Como no queremos crear ninguna plantilla, nos devuelve directamente a la plantilla de perfil con la lista borrada.

    #[Route('perfil/remover_juego/{lista}', name: 'app_remover_juego_lista')]
    public function remover(ListaJuegos $lista, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($lista);
        $entityManager->flush();
        return $this->redirectToRoute('app_perfil');
    }

    // esta función recoge del perfil tanto el comentario como el videojuego ya que para poder modificar un dato de la lista requiere tanto el usuario como el videojuego.
    //al igual que con la anterior función, nos devuelve a la plantilla de perfil con el comentario añadido.

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

    #[Route('/bootstrap', name:'app_bootstrap')]
    public function ejemplo(VideojuegoRepository $videojuegoRepository): Response
    {
        return $this->render('bootstrap/prueba.html.twig', [
            'videojuegos'=>$videojuegoRepository->findAll(),
        ]);
    }

}