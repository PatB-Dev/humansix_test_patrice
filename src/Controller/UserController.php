<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(path="", name="home_")
 */
class UserController extends AbstractController
{
    /**
     * @Route(path="/monprofil", name="profil")
     */
    public function index(): Response
    {
        //Check user connecté
        $user = $this->getUser();
        if($user){
            return $this->render('user/index.html.twig');
        }
        //Si non connecté retour à la page de connexion
        return $this->redirectToRoute('app_login');
    }
}
