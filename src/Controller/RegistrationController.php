<?php

namespace App\Controller;

use App\Entity\Usuario;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class RegistrationController extends AbstractController
{

    // Aqui con el fomulario ya creado, solo falta de comprobar si el nombre y las contraseñas son válidas para de nuevo, que entity manager cree el usuario.

    #[Route('/register', name: 'app_register')]
    public function register(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = new Usuario();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);
        $error = null;
        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get('password')->getData() == $form->get('plainPassword')->getData()) {
                $user->setPassword($form->get('password')->getData());
                $creado = $request->get('usuarioCreado');
                if (isset($_SESSION)) {
                    session_abort();
                }
                session_start();
                $_SESSION["mensaje"] = $creado;
                $entityManager->persist($user);
                $entityManager->flush();
                return $this->redirectToRoute('app_inicio');
            } else {
                $error = "Las contraseñas no coinciden";
            }
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
            'error' => $error,
        ]);
    }
    // A diferencia del registro, el formulario de inicio de sesión no esta creado por una clase.
    // Aqui solo mostramos el formulario, el que lo controla esta en /Security

    #[Route('/iniciar_sesion', name: 'app_inicio_sesion')]
    public function inicioSesion(AuthenticationUtils $authenticationUtils): Response
    {
        return $this->render('registration/inicio_sesion.html.twig', [
            'error' => $authenticationUtils->getLastAuthenticationError(),
        ]);
    }

    // Este método se encarga de cerrar la sesión del usuario.
}
