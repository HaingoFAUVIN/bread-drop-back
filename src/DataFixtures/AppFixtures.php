<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Bakery;
use App\Entity\Category;
use Bluemmb\Faker\PicsumPhotosProvider;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\DataFixtures\Provider\BreadDropProvider;

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
        // on lui donne aussi le nôtre
        $faker->addProvider(new BreadDropProvider());

        // 1- Création de 50 personnes : table user
        $allPersons = [];
        for ($i = 0; $i < 50; $i++) {
            $user = new User();
            $user->setFirstname($faker->firstNameMale);
            $user->setLastname($faker->lastName);         
            $user->setPassword($faker->password);
            $user->setRole("ROLE_USER"); // PHP => JSON
            $user->setAdress($faker->address);
            $user->setEmail($faker->email);
            $user->setPhone($faker->unique()->numerify('##########'));
            $user->setPicture($faker->imageUrl(450, 300, true));
            $user->setCreatedAt($faker->dateTimeBetween('-2years', 'now')); // Date de création des 2 dernières années

            $manager->persist($user);

            // On ajoute l'entité à sa liste
            $allPersons[] = $user;

        }

        $allAdmins = [];
        // Création de 20 gérants de boulangerie : table user
        for ($j = 0; $j < 20; $j++) {
            $admin = new User();
            $admin->setFirstname($faker->firstNameMale);
            $admin->setLastname($faker->lastName);                                  
            // admin, via bin/console security:hash-password
            $admin->setPassword($faker->password);
            $admin->setRole("ROLE_ADMIN"); // PHP => JSON
            $admin->setAdress($faker->address);
            $admin->setEmail($faker->email);
            $admin->setPhone($faker->unique()->numerify('##########'));
            $admin->setPicture($faker->imageUrl(450, 300, true));
            $admin->setCreatedAt($faker->dateTimeBetween('-2years', 'now')); // Date de création des 2 dernières années

            $manager->persist($admin);

            // On ajoute l'entité à sa liste
            $allAdmins[] = $admin;
        }

        // on mélange les gérants
        // et on ira piocher la 1, 2, 3, 4 etc.
        // afin de ne pas avoir de doublon !
        shuffle($allAdmins);

        // Création de 20 boulangeries : table bakery
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

        // Création des 4 catégories de produits : table category
        for ($l = 0; $l < 4; $l++) {
            // Category
            $category = new Category();
            $category->setName($faker->categoriesList[$l]);
            $category->setCreatedAt($faker->dateTimeBetween('-2years', 'now')); // Date de création des 2 dernières années
            $manager->persist($category);
        }

        $manager->flush();
    }

}
