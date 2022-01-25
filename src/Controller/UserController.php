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
        //$user = $this->getUser();

        return $this->render('user/index.html.twig');
    }
}
