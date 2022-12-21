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
}
