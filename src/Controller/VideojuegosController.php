<?php

namespace App\Controller;

use App\Entity\Videojuego;
use App\Repository\VideojuegoRepository;
use Blackfire\Profile\Request;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ListaJuegos;

#[IsGranted('IS_FULLY_AUTHENTICATED')]
class VideojuegosController extends ControladorBase
{

    #[Route('/videojuegos', name: 'app_videojuegos')]
    #[IsGranted('ROLE_USER')]
    public function index(VideojuegoRepository $videojuegoRepository): Response
    {
        return $this->render('videojuegos/index.html.twig', [
            'videojuego' => $videojuegoRepository->findAll(),
        ]);
    }

    #[Route('/videojuegos/{slug}', name: 'app_videojuego')]
    public function mostrarVideojuego(VideojuegoRepository $videojuegoRepository, $slug): Response
    {
        //dd($videojuegoRepository);
        $videojuego = $videojuegoRepository->findOneBy(['slug' => $slug]);
        $foto = $slug;

        return $this->render('videojuegos/videojuego.html.twig', [
            'videojuego' => $videojuego,
            'foto' => $foto,
        ]);
    }

    #[Route('/videojuegos/{slug}/lista', name: 'app_annadir_lista')]
    public function annadirLista(VideojuegoRepository $videojuegoRepository, EntityManagerInterface $entityManager, $slug): Response
    {
        $videojuego = $videojuegoRepository->findOneBy(['slug' => $slug]);
        $usuario = $this->getUser();
        $lista=new ListaJuegos($usuario, $videojuego);
        //dd($lista);
        //$lista = $usuario->addListaJuego($usuario->getId(), $videojuego->getId());
        $usuario->addListajuego($lista);
        $videojuego->addListajuego($lista);
        $entityManager->persist($lista);
        $entityManager->flush();
        return $this->redirectToRoute('app_perfil');
    }
}
