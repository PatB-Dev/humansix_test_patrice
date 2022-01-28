<?php

namespace App\Controller;



use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(path="", name="home_")
 */
class UserController extends AbstractController
{
    /**
     * @Route(path="/monprofil", name="profil", methods={"GET", "POST"})
     */
    public function index(EntityManagerInterface $em)
    {

        //Check user connecté?
        $user = $this->getUser();
        if($user){
            $orders = $em->getRepository(Order::class)->findAll();

            return $this->render('user/index.html.twig', ['orders' => $orders]);
        }
        //Si non connecté retour à la page de connexion
        return $this->redirectToRoute('app_login');
    }
}
