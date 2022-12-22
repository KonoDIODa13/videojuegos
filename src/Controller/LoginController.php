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

class LoginController extends AbstractController
{
    #[Route('/iniciar_sesion', name: 'app_inicio_sesion')]
    public function inicioSesion(AuthenticationUtils $authenticationUtils): Response
    {
        return $this->render('login/iniciarSesion.html.twig', [
            'error' => $authenticationUtils->getLastAuthenticationError(),
        ]);
    }

    #[Route('/registrar', name: 'app_registrar')]
    public function register(Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        $user = new Usuario();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);
        $error = null;
        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get('password')->getData() == $form->get('plainPassword')->getData()) {
                $user->setPassword($form->get('password')->getData());
                $user->setPlainPassword($form->get('plainPassword')->getData());
                $creado = $request->get('usuarioCreado');
                if (isset($_SESSION)) {
                    session_abort();
                }
                session_start();
                $_SESSION["mensaje"] = $creado;
                $entityManagerInterface->persist($user);
                $entityManagerInterface->flush();
                return $this->redirectToRoute('app_inicio');
            } else {
                $error = "Las contraseñas no coinciden";
            }
        }
        return $this->render('login/registrar.html.twig', [
            'registrationForm' => $form->createView(),
            'error' => $error,
        ]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException();
    }
}
