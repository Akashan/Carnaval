<?php

namespace Carnaval\UserBundle\Handler;

use DateTimeZone;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;

class LoginSuccessHandler extends ContainerAware implements AuthenticationSuccessHandlerInterface
{

    protected $router;
    protected $security;

    public function __construct(Router $router, SecurityContext $security)
    {
        $this->router = $router;
        $this->security = $security;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        $user = $token->getUser();

        $user->setLastLogin(new \DateTime('now', new DateTimeZone('Europe/Paris')));

        // On enregistre l'article
        $em = $this->container->get('doctrine')->getManager();
        $em->persist($user);
        $em->flush();

        // redirect the user to where they were before the login process begun.
        $referer_url = $request->headers->get('referer');

        $response = new RedirectResponse($referer_url);

        return $response;
    }

}