<?php

namespace App\Security;

use App\Repository\UsuarioRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;

class InicioSesionAuthenticator extends AbstractAuthenticator
{
    private UsuarioRepository $usuarioRepository;
    private RouterInterface $router;

    public function __construct(UsuarioRepository $usuarioRepository, RouterInterface $router)
    {
        $this->usuarioRepository = $usuarioRepository;
        $this->router = $router;
    }

    // esta funcion recoge la informacion sobre de donde viene la ruta
    public function supports(Request $request): ?bool
    {
        return ($request->getPathInfo() === '/iniciar_sesion' && $request->isMethod('POST'));
    }

    // esta funcion recoge los datos del form crea un pasaporte que es la manera que tiene symfony de logearte como usuario
    public function authenticate(Request $request): Passport
    {
        $nombreUsuario = $request->get('nombreUsuario');
        $contra = $request->get('contra');
        $pasaporte = new Passport(
            new UserBadge($nombreUsuario, function ($userIdentifier) {
                $usuario = $this->usuarioRepository->findOneBy(['username' => $userIdentifier]);

                if (!$usuario) {
                    throw new UserNotFoundException();
                }

                return $usuario;
            }),
            new PasswordCredentials($contra),
            [
                new CsrfTokenBadge(
                    'authenticate',
                    $request->request->get('_csrf_token'),
                ),
            ]
        );
        return $pasaporte;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): RedirectResponse
    {
        $nombre = $request->get("nombreUsuario");
        $usuario = $this->usuarioRepository->findOneBy(["username" => $nombre]);

        if ($usuario->getUsername() == "admin") {
            return new RedirectResponse(
                $this->router->generate('admin')
            );
        }
        return new RedirectResponse(
            $this->router->generate('app_perfil')
        );
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        $request->getSession()->set(Security::AUTHENTICATION_ERROR, $exception);
        return new RedirectResponse(
            $this->router->generate('app_inicio_sesion')
        );
    }

    //    public function start(Request $request, AuthenticationException $authException = null): Response
    //    {
    //        /*
    //         * If you would like this class to control what happens when an anonymous user accesses a
    //         * protected page (e.g. redirect to /login), uncomment this method and make this class
    //         * implement Symfony\Component\Security\Http\EntryPoint\AuthenticationEntryPointInterface.
    //         *
    //         * For more details, see https://symfony.com/doc/current/security/experimental_authenticators.html#configuring-the-authentication-entry-point
    //         */
    //    }
}
