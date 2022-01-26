<?php

namespace App\DataFixtures;

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
/***********USERS************/
        //on crée un admin
        $user = new User();
        $user->setUsername('admin');
        $user->setFirstName('admin');
        $user->setLastName('admin');
        // encodePassword => hash du mot de passe
        $user->setPassword($this->encoder->encodePassword($user, 'S3cr3T+'));
        //on sauvegarde en bdd tout de suite
        $manager->persist($user);

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

        $manager->flush();

/***********USERS FIN************/

/***********PRODUCTS************/
        //Création du Product1
        $product = new Product();
        $product->setSku('ref1');
        $product->setName('Product1');
        $product->setQuantity('10');
        $product->setPrice(14.00);
        //on sauvegarde en bdd tout de suite
        $manager->persist($product);

        //Création du Product2
        $product = new Product();
        $product->setSku('ref2');
        $product->setName('Product2');
        $product->setQuantity('10');
        $product->setPrice(10.00);
        //on sauvegarde en bdd tout de suite
        $manager->persist($product);

        //Création du Product3
        $product = new Product();
        $product->setSku('ref3');
        $product->setName('Product3');
        $product->setQuantity('10');
        $product->setPrice(15.00);
        //on sauvegarde en bdd tout de suite
        $manager->persist($product);

        //Création du Product4
        $product = new Product();
        $product->setSku('ref4');
        $product->setName('Product4');
        $product->setQuantity('10');
        $product->setPrice(20.00);

        //on sauvegarde en bdd tout de suite
        $manager->persist($product);
        $manager->flush();
/***********PRODUCTS FIN************/

    }
}
