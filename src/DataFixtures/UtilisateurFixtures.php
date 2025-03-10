<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class UtilisateurFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        // Faker's instance creation
        $faker = Factory::create();

        // Creation of 15 users

        for($i =0; $i<=20; $i++){
            $utilisateur = new Utilisateur();
            $utilisateur->setNomUtilisateur($faker->lastName);
            $utilisateur->setEmailUtilisateur($faker->email);
            $utilisateur->setPassword($faker->password);
            $utilisateur->setTelUtilisateur($faker->phoneNumber)


        }

        $manager->flush();
    }
}
