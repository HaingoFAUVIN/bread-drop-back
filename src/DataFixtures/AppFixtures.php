<?php

namespace App\DataFixtures;

use Faker\Factory;
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

        // Création de 20 boulangeries
        for ($i = 0; $i < 20; $i++) {
           $bakery = new Bakery();
           $bakery->setName($faker->compagny);
           $bakery->setAdress($faker->address);
           // https://stackoverflow.com/questions/74580435/how-to-generate-mobile-phone-number-with-faker
           $bakery->setPhone($faker()->unique()->e164PhoneNumber());
           $bakery->setPicture($faker->imageUrl(450, 300, true));
           $bakery->setDistance(mt_rand(0, 25)); // Distance de recherche entre 0 et 25km
           $bakery->setCreatedAt($faker->dateTimeBetween('-2years', 'now')); // Date de création des 2 dernières années
           $manager->persist($bakery);
        }

        $manager->flush();
    }
}
