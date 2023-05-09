<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Bakery;
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

        // Création de 20 boulangeries
        for ($i = 0; $i < 20; $i++) {
           $bakery = new Bakery();
           $bakery->setName($faker->compagny);
           $bakery->setAdress($faker->address);
           $bakery->setPhone('Tél-'. $i);
           $bakery->setPicture('Photo-'. $i);
           $bakery->setDistance($i);
           $bakery->setCreatedAt($faker->dateTimeBetween('-2years', 'now'));
           $manager->persist($bakery);
        }

        $manager->flush();
    }
}
