<?php

namespace App\Controller;

use App\Form\LoginUserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class ConnexionController extends AbstractController
{
    /**
     * @Route("", name="app_login")
     */
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        $loginForm = $this->createForm(LoginUserType::class);
        return $this->render('security/login.html.twig', [
            'loginForm' => $loginForm->createView()]);
    }
}
