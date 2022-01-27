<?php

namespace App\Controller;


use App\Entity\Orders;
use App\Entity\Product;
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
            $product = $em->getRepository(Product::class)->findAll();
            $orders = $em->getRepository(Orders::class)->findAll();

            return $this->render('user/index.html.twig', ['products' => $product, 'orders' => $orders]);
        }
        //Si non connecté retour à la page de connexion
        return $this->redirectToRoute('app_login');
    }
}
