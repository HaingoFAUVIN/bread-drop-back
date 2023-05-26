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
use App\Entity\Order;
use App\Entity\OrderProduct;
use App\Entity\Product;
use App\Entity\Schedule;

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

        // 1 - USER
        // Création de 50 personnes : table user
        $allPersons = [];
        for ($i = 0; $i < 50; $i++) {
            $user = new User();
            $user->setFirstname($faker->firstNameMale);
            $user->setLastname($faker->lastName);         
            $user->setPassword($faker->password);
            $user->setRoles(["ROLE_USER"]); // PHP => JSON
            $user->setAdress($faker->address);
            $user->setEmail($faker->email);
            $user->setPhone($faker->unique()->numerify('##########'));
            $user->setPicture($faker->imageUrl(450, 300, true));
            $user->setCreatedAt($faker->dateTimeBetween('-2years', 'now')); // Date de création des 2 dernières années

            $manager->persist($user);

            // On ajoute l'entité à sa liste
            $allPersons[] = $user;

        }

         // 3 utilisateurs
         $admin = new User();
         $admin->setEmail('admin@admin.com');
         $admin->setRoles(['ROLE_ADMIN']); // PHP => JSON
         // admin, via bin/console security:hash-password
         $admin->setPassword('$2y$13$.PJiDK3kq2C4owW5RW6Z3ukzRc14TJZRPcMfXcCy9AyhhA9OMK3Li');
         $admin->setAdress($faker->address);
         $admin->setCreatedAt($faker->dateTimeBetween('-2years', 'now')); // Date de création des 2 dernières années
         $manager->persist($admin);


        $allProfessionals = [];
        // Création de 20 gérants de boulangerie : table user
        for ($j = 0; $j < 20; $j++) {
            $professional = new User();
            $professional->setFirstname($faker->firstNameMale);
            $professional->setLastname($faker->lastName);                                  
            // manager, via bin/console security:hash-password
            $professional->setPassword($faker->password);
            $professional->setRoles(["ROLE_MANAGER"]); // PHP => JSON
            $professional->setAdress($faker->address);
            $professional->setEmail($faker->email);
            $professional->setPhone($faker->unique()->numerify('##########'));
            $professional->setPicture($faker->imageUrl(450, 300, true));
            $professional->setCreatedAt($faker->dateTimeBetween('-2years', 'now')); // Date de création des 2 dernières années

            $manager->persist($professional);

            // On ajoute l'entité à sa liste
            $allProfessionals[] = $professional;
        }

        // on mélange les gérants
        // et on ira piocher la 1, 2, 3, 4 etc.
        // afin de ne pas avoir de doublon !
        shuffle($allProfessionals);

        // 2 - BAKERY
        // Création de 20 boulangeries : table bakery
        $allBakeries = [];
        for ($k = 0; $k < 20; $k++) {
           $bakery = new Bakery();
           $bakery->setName($faker->company);
           $bakery->setAdress($faker->addressBakeriesList[$k]);
           // https://stackoverflow.com/questions/74580435/how-to-generate-mobile-phone-number-with-faker
           $bakery->setPhone($faker->unique()->numerify('##########'));
           $bakery->setPicture($faker->imageUrl(450, 300, true));
           $bakery->setDistance(mt_rand(0, 25)); // Distance de recherche entre 0 et 25km
           $bakery->setCreatedAt($faker->dateTimeBetween('-2years', 'now')); // Date de création des 2 dernières années

            // On récupère l'manager à l'index $k, pas de doublon grâce au shuffle plus haut
            $bakery->setUser($allProfessionals[$k]);

           $manager->persist($bakery);

            // On ajoute l'entité à sa liste
            $allBakeries[] = $bakery;

        }

        // 3- CATEGORY
        // Création des 4 catégories de produits : table category
        $allCategories = [];
        for ($l = 0; $l < 4; $l++) {

            $category = new Category();
            $category->setName($faker->categoriesList[$l]);
            $category->setCreatedAt($faker->dateTimeBetween('-2years', 'now')); // Date de création des 2 dernières années
            $manager->persist($category);

            // On ajoute l'entité à sa liste
            $allCategories[] = $category;
        }

        // 4- PRODUCT
        // Création de 9 produits de catégorie pain : table product
        $allBread = [];
        for ($k = 0; $k < 10; $k++) {
           $breadProduct = new Product();
           $breadProduct->setName($faker->breadProductName());
           $breadProduct->setPrice(mt_rand(5, 10)); //  entre 5 et 10€
           $breadProduct->setStock(mt_rand(10, 20)); //  entre 10 et 20€
           $breadProduct->setPicture($faker->imageUrl(450, 300, true));
           $breadProduct->setDescription($faker->text());
           $breadProduct->setCreatedAt($faker->dateTimeBetween('-2years', 'now')); // Date de création des 2 dernières années

            // On associe une catégorie à un produit
            $breadProduct->setCategory($allCategories[0]);

           $manager->persist($breadProduct);
           
            // On ajoute l'entité à sa liste
            $allBread[] = $breadProduct;

        }

        // Création de 5 produits de catégorie viennoiserie : table product
        $allPastries = [];
        for ($k = 0; $k < 5; $k++) {
           $pastriesProduct = new Product();
           $pastriesProduct->setName($faker->Unique()->pastriesProductName());
           $pastriesProduct->setPrice(mt_rand(5, 10)); //  entre 5 et 10€
           $pastriesProduct->setStock(mt_rand(10, 20)); //  entre 5 et 10€
           $pastriesProduct->setPicture($faker->imageUrl(450, 300, true));
           $pastriesProduct->setDescription($faker->text());
           $pastriesProduct->setCreatedAt($faker->dateTimeBetween('-2years', 'now')); // Date de création des 2 dernières années

            // On associe une catégorie à un produit
            $pastriesProduct->setCategory($allCategories[1]);

           $manager->persist($pastriesProduct);

            // On ajoute l'entité à sa liste
            $allPastries[] = $pastriesProduct;
        }

        // Création de 5 produits de catégorie patisserie : table product
        $allPastry = [];
        for ($k = 0; $k < 5; $k++) {
           $pastryProduct = new Product();
           $pastryProduct->setName($faker->Unique()->pastryProductName());
           $pastryProduct->setPrice(mt_rand(5, 10)); //  entre 5 et 10€
           $pastryProduct->setStock(mt_rand(10, 20)); //  entre 5 et 10€
           $pastryProduct->setPicture($faker->imageUrl(450, 300, true));
           $pastryProduct->setDescription($faker->text());
           $pastryProduct->setCreatedAt($faker->dateTimeBetween('-2years', 'now')); // Date de création des 2 dernières années

            // On associe une catégorie à un produit
            $pastryProduct->setCategory($allCategories[2]);

           $manager->persist($pastryProduct);

            // On ajoute l'entité à sa liste
            $allPastry[] = $pastryProduct;
        }

        // Création de 5 produits de catégorie sandwitch : table product
        $allSandwitch = [];
        for ($k = 0; $k < 5; $k++) {
            $sandwitchProduct = new Product();
            $sandwitchProduct->setName($faker->Unique()->sandwitchProductName());
            $sandwitchProduct->setPrice(mt_rand(5, 10)); //  entre 5 et 10€
            $sandwitchProduct->setStock(mt_rand(10, 20)); //  entre 5 et 10€
            $sandwitchProduct->setPicture($faker->imageUrl(450, 300, true));
            $sandwitchProduct->setDescription($faker->text());
            $sandwitchProduct->setCreatedAt($faker->dateTimeBetween('-2years', 'now')); // Date de création des 2 dernières années

            // On associe une catégorie à un produit
            $sandwitchProduct->setCategory($allCategories[3]);

            $manager->persist($sandwitchProduct);
        
            // On ajoute l'entité à sa liste
            $allSandwitch[] = $sandwitchProduct;
        }

        // 5- ORDER
        // Création de 10 commandes : table order
        $allOrder = [];
        for ($k = 0; $k < 10; $k++) {
            $order = new Order();
            $order->setDate($faker->dateTimeBetween('-1week', 'now'));
            $order->setUser($allPersons[$k]);
            $order->setPrice(mt_rand(5, 50)); //  entre 5 et 50
            $order->setStatus(mt_rand(0, 1)); //  vrai = 1 , faux = 0
            $order->setDelivery(mt_rand(0, 1)); //  vrai = 1 , faux = 0
            $order->setSchedule($faker->dateTimeBetween('-1week', 'now')); 
            $order->setCreatedAt($faker->dateTimeBetween('-2years', 'now')); // Date de création des 2 dernières années

            $manager->persist($order);
        
            // On ajoute l'entité à sa liste
            $allOrder[] = $order;
        }

        // 6- SCHEDULE : horaires d'ouverture de 20 boulangeries
        // Pour chaque jour de la semaine, on crée les horaires de chaque boulangerie
        for ($d = 0; $d < 7; $d++) {
            for ($l = 0; $l < 20; $l++) {
                $bakerySchedule = new Schedule();
                $bakerySchedule->setDay($faker->daysList[$d]);
                $bakerySchedule->setOpenMorning("0" . mt_rand(7, 8) . "h" . "00"); //  entre 7 et 8h
                $bakerySchedule->setCloseMorning(mt_rand(12, 13) . "h" . "00"); 
                $bakerySchedule->setOpenAfternoon(mt_rand(14, 15) . "h" ."00"); 
                $bakerySchedule->setCloseAfternoon(mt_rand(19, 20) . "h" ."00");
                $bakerySchedule->setCreatedAt($faker->dateTimeBetween('-2years', 'now')); // Date de création des 2 dernières années

                // Associer une boulangerie à un horaire par jour
                $bakerySchedule->setBakery($allBakeries[$l]);

                $manager->persist($bakerySchedule);

            }
        }

        // 7-1 Un produit est associé à une boulangerie : catégorie Sandwitch
        foreach ($allBakeries as $bakery) {

            // On mélange les Sandwitch et on en récupère 0 à 4 au hasard
            shuffle($allSandwitch);
            $sandwitchCount = mt_rand(0, 4);
            for ($i = 1; $i <= $sandwitchCount; $i++) {
                $bakery->addProduct($allSandwitch[$i]);
                
            }
        }

        // 7-2 BAKERY_PRODUCT : catégorie Pastries
        foreach ($allBakeries as $bakery) {

            // On mélange les Pastries et on en récupère 0 à 4 au hasard
            shuffle($allPastries);
            $pastriesCount = mt_rand(0, 4);
            for ($i = 1; $i <= $pastriesCount; $i++) {
                $bakery->addProduct($allPastries[$i]);
                
            }
        }
        // 7-3 BAKERY_PRODUCT : catégorie Pastry
        foreach ($allBakeries as $bakery) {

            // On mélange les Pastry et on en récupère 0 à 4 au hasard
            shuffle($allPastry);
            $pastryCount = mt_rand(0, 4);
            for ($i = 1; $i <= $pastryCount; $i++) {
                $bakery->addProduct($allPastry[$i]);
                
            }
        }
        
        // 7-4 BAKERY_PRODUCT : catégorie Bread
        foreach ($allBakeries as $bakery) {

            // On mélange les Bread et on en récupère 0 à 4 au hasard
            shuffle($allBread);
            $sandwitchCount = mt_rand(0, 4);
            for ($i = 1; $i <= $sandwitchCount; $i++) {
                $bakery->addProduct($allBread[$i]);
                
            }
        }

        // 8-1 ORDER_PRODUCT : catégorie Sandwitch
        foreach ($allOrder as $order) {
            // On mélange les Sandwitch et on en récupère 0 à 4 au hasard
            shuffle($allSandwitch);
            $sandwitchCount = mt_rand(0, 4);
            for ($i = 1; $i <= $sandwitchCount; $i++) {
                $orderProduct = new OrderProduct();
                $orderProduct->setProduct($allSandwitch[$i]);
                $orderProduct->setOrder($allOrder[$i]);
                $orderProduct->setQuantity(mt_rand(1, 10));

                $manager->persist($orderProduct);
            }
        }

        // 8-2 ORDER_PRODUCT : catégorie Bread
        foreach ($allOrder as $order) {
            // On mélange les Bread et on en récupère 0 à 4 au hasard
            shuffle($allBread);
            $breadCount = mt_rand(0, 4);
            for ($i = 1; $i <= $breadCount; $i++) {
                $orderProduct = new OrderProduct();
                $orderProduct->setProduct($allBread[$i]);
                $orderProduct->setOrder($allOrder[$i]);
                $orderProduct->setQuantity(mt_rand(1, 10));

                $manager->persist($orderProduct);
            }
        }

        // 8-3 ORDER_PRODUCT : catégorie Pastry
        foreach ($allOrder as $order) {
            // On mélange les Pastry et on en récupère 0 à 4 au hasard
            shuffle($allPastry);
            $pastryCount = mt_rand(0, 4);
            for ($i = 1; $i <= $pastryCount; $i++) {
                $orderProduct = new OrderProduct();
                $orderProduct->setProduct($allPastry[$i]);
                $orderProduct->setOrder($allOrder[$i]);
                $orderProduct->setQuantity(mt_rand(1, 10));

                $manager->persist($orderProduct);
            }
        }

        // 8-4 ORDER_PRODUCT : catégorie Pastries
        foreach ($allOrder as $order) {
            // On mélange les Pastries et on en récupère 0 à 4 au hasard
            shuffle($allPastries);
            $pastriesCount = mt_rand(0, 4);
            for ($i = 1; $i <= $pastriesCount; $i++) {
                $orderProduct = new OrderProduct();
                $orderProduct->setProduct($allPastries[$i]);
                $orderProduct->setOrder($allOrder[$i]);
                $orderProduct->setQuantity(mt_rand(1, 10));

                $manager->persist($orderProduct);
            }
        }

        $manager->flush();
    }

}
