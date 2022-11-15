<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\RememberMeBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use App\Repository\UsuarioRepository;

class RegistroAuthenticator extends AbstractAuthenticator
{
    private UsuarioRepository $usuarioRepository;
    private RouterInterface $router;

    public function __construct(UsuarioRepository $usuarioRepository, RouterInterface $router)
    {
        $this->usuarioRepository = $usuarioRepository;
        $this->router = $router;
    }

    public function supports(Request $request): ?bool
    {
        return ($request->getPathInfo() === '/registrarse' && $request->isMethod('POST'));
    }

    public function authenticate(Request $request): Passport
    {
        $nombreUsuario = $request->get('nombreUsuario');
        $contra = $request->get('contra');

        $pasaporte = new Passport(
            new UserBadge($nombreUsuario, function ($identificadorUsuario) {
                $usuario = $this->usuarioRepository->findOneBy(['username' => $identificadorUsuario]);
                if (!$usuario) {
                    throw new UserNotFoundException();
                }
                //dd($usuario);
                return $usuario;
            }),
            new PasswordCredentials($contra),
            [
                new CsrfTokenBadge(
                    'authenticate',
                    $request->get('_csrf_token'),
                ),
                (new RememberMeBadge())->enable(),
            ]
        );
        //dd($pasaporte);
        return $pasaporte;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        return new RedirectResponse(
            $this->router->generate('app_inicio')
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        dd('F registro');
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
