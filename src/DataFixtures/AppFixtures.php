<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Bakery;
use Bluemmb\Faker\PicsumPhotosProvider;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // On instancie Faker
        $faker = Factory::create('fr_FR');

        // si on veut toujours le même hasard (valeur numérique !)
        $faker->seed(2023);

        // on donne à Faker le nouveau Provider qu'on a requis pour les images random
        $faker->addProvider(new PicsumPhotosProvider($faker));

        // Création de 50 clients
        $allCustomers = [];
        for ($i = 0; $i < 50; $i++) {
            $userCustomer = new User();
            $userCustomer->setFirstname($faker->firstNameMale);
            $userCustomer->setLastname($faker->lastName);                                  
            // admin, via bin/console security:hash-password
            $userCustomer->setPassword($faker->password);
            $userCustomer->setRole("ROLE_USER"); // PHP => JSON
            $userCustomer->setAdress($faker->address);
            $userCustomer->setEmail($faker->email);
            $userCustomer->setPhone($faker->unique()->numerify('##########'));
            $userCustomer->setPicture($faker->imageUrl(450, 300, true));
            $userCustomer->setCreatedAt($faker->dateTimeBetween('-2years', 'now')); // Date de création des 2 dernières années

            $manager->persist($userCustomer);

            // On ajoute l'entité à sa liste
            $allCustomers[] = $userCustomer;

        }

        $allAdmins = [];
        // Création de 20 gérants de boulangerie
        for ($j = 0; $j < 20; $j++) {
            $userAdmin = new User();
            $userAdmin->setFirstname($faker->firstNameMale);
            $userAdmin->setLastname($faker->lastName);                                  
            // admin, via bin/console security:hash-password
            $userAdmin->setPassword($faker->password);
            $userAdmin->setRole("ROLE_ADMIN"); // PHP => JSON
            $userAdmin->setAdress($faker->address);
            $userAdmin->setEmail($faker->email);
            $userAdmin->setPhone($faker->unique()->numerify('##########'));
            $userAdmin->setPicture($faker->imageUrl(450, 300, true));
            $userAdmin->setCreatedAt($faker->dateTimeBetween('-2years', 'now')); // Date de création des 2 dernières années

            $manager->persist($userAdmin);

            // On ajoute l'entité à sa liste
            $allAdmins[] = $userAdmin;
        }

        // on mélange les gérants
        // et on ira piocher la 1, 2, 3, 4 etc.
        // afin de ne pas avoir de doublon !
        shuffle($allAdmins);

        // Création de 20 boulangeries
        $allBakeries = [];
        for ($k = 0; $k < 20; $k++) {
           // Bakery
           $bakery = new Bakery();
           $bakery->setName($faker->company);
           $bakery->setAdress($faker->address);
           // https://stackoverflow.com/questions/74580435/how-to-generate-mobile-phone-number-with-faker
           $bakery->setPhone($faker->unique()->numerify('##########'));
           $bakery->setPicture($faker->imageUrl(450, 300, true));
           $bakery->setDistance(mt_rand(0, 25)); // Distance de recherche entre 0 et 25km
           $bakery->setCreatedAt($faker->dateTimeBetween('-2years', 'now')); // Date de création des 2 dernières années

            // On récupère l'admin à l'index $k, pas de doublon grâce au shuffle plus haut
            $bakery->setUser($allAdmins[$k]);

           $manager->persist($bakery);

        }

        $manager->flush();
    }

}
