<?php

namespace App\DataFixtures;

use App\Entity\Orders;
use App\Entity\OrderStatus;
use App\Entity\Product;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

//Dans le terminal : php bin/console doctrine:fixtures:load
class AppFixtures extends Fixture
{

    private UserPasswordEncoderInterface $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder){
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
/***********PRODUCTS************/
        //charge le fichier sql pour insertion des produits
        $sql = file_get_contents(__DIR__ . '/insert_products.sql');
        $stmt = $manager->getConnection()->prepare($sql);
        $stmt->execute();
/***********PRODUCTS FIN************/

/***********USERS************/
        //Création de John Dow
        $user = new User();
        $user->setUsername('John1');
        $user->setFirstName('John');
        $user->setLastName('Dow');
        // encodePassword => hash du mot de passe
        $user->setPassword($this->encoder->encodePassword($user, 'test'));
        //on sauvegarde en bdd tout de suite
        $manager->persist($user);

        //Création de Walter White
        $user = new User();
        $user->setUsername('Walter');
        $user->setFirstName('Walter');
        $user->setLastName('White');
        // encodePassword => hash du mot de passe
        $user->setPassword($this->encoder->encodePassword($user, 'test'));
        //on sauvegarde en bdd tout de suite
        $manager->persist($user);

        //Création de John Snow
        $user = new User();
        $user->setUsername('John2');
        $user->setFirstName('John');
        $user->setLastName('Snow');
        // encodePassword => hash du mot de passe
        $user->setPassword($this->encoder->encodePassword($user, 'test'));
        //on sauvegarde en bdd tout de suite
        $manager->persist($user);

        //Création de l'admin
        $user = new User();
        $user->setUsername('admin');
        $user->setFirstName('admin');
        $user->setLastName('admin');
        // encodePassword => hash du mot de passe
        $user->setPassword($this->encoder->encodePassword($user, 'S3cr3T+'));
        //on sauvegarde en bdd tout de suite
        $manager->persist($user);

        $manager->flush();

/***********USERS FIN************/

/***********ORDERS FIN************/
        //Création des status des commandes
        $order_status = new OrderStatus();
        $order_status->setName('processing');
        $manager->persist($order_status);

        $order_status = new OrderStatus();
        $order_status->setName('canceled');
        $manager->persist($order_status);
        $manager->flush();

        //Récup des repos user, status et product pour avoir accès aux autres tables via les FK
        $user = $manager->getRepository(User::class);
        $status = $manager->getRepository(OrderStatus::class);
        $product = $manager->getRepository(Product::class);

        //Création des commandes fictives suite à la récup des repo
        $order = new Orders();
        $order->setUserId($user->find(1));
        $order->setStatus($status->find(1));
        $order->setDate(new \DateTime('2019-09-02 17:02:53'));
        $order->setProductsId($product->find(1));
        $manager->persist($order);
        $manager->flush();
/***********ORDERS FIN************/

    }
}
