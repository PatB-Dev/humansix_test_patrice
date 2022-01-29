<?php

namespace App\Controller;

use App\Entity\Order;
use App\Entity\User;
use App\Form\OrderType;
use DateTime;
use DateTimeZone;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateOrderController extends AbstractController
{
    /**
     * @Route("/create/order", name="create_order")
     */
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        //Récup de la date du jour actuel
        $dateDuJour = new DateTime('NOW', new DateTimeZone('EUROPE/Paris'));
        $dateDuJour->modify('-1 day');

        //Instanciation d'une commande vide
        $order = new Order();
        //Chargement de la date du jour dans la nouvelle commande
        $order->setDateCreated($dateDuJour);

        //Récup de l'utilisateu actuellement connecté
        $user = $em->getRepository(User::class)->find($this->getUser());

        $form = $this->createForm(OrderType::class, $order);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

        }


        return $this->render('create_order/index.html.twig', [
            'orderForm' => $form->createView(),
        ]);
    }
}
