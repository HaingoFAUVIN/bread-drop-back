<?php

namespace App\Controller\Back;

use App\Entity\User;
use App\Entity\Bakery;
use App\Entity\Product;
use App\Repository\OrderRepository;
use App\Repository\BakeryRepository;
use App\Repository\ProductRepository;
// use Symfony\Bridge\Doctrine\ManagerRegistry;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/back/boulangerie")
 */
class OrderController extends AbstractController
{
    /**
     * @Route("/{id<\d+>}", name="app_back_order_index", methods={"GET"})
     */
    public function index(int $id, BakeryRepository $bakeryRepository, ProductRepository $productRepository, OrderRepository $orderRepository): Response
    {
        //On récupère les données de la boulangerie
        $bakery = $bakeryRepository->find($id);
        // dd($bakery);

        $products = $bakery->getProducts();
        foreach ($products as $product) {
            dump($product);
        }
        dd($bakery);
        // // 404 ?
        // if ($bakery === null) {
        //     throw $this->createNotFoundException('Boulangerie non trouvée');
        // }

        // https://symfony.com/doc/current/doctrine/associations.html#joining-related-records
        // https://symfony.com/doc/current/doctrine/associations.html#fetching-related-objects
        // https://symfony.com/doc/current/doctrine/associations.html
        // on va chercher les produits de la boulangerie
        // $products = $bakery->getProducts();


        //On récupère les commandes
        // $ordersByUser = $orderRepository->findBy(['bakery' => $bakery]);

        // dd($products);

        return $this->render('back/order/index.html.twig', [
            'orders' => $product,
            'bakery' => $bakery
        ]);
    }
}


/**
 * @Route("/back/commandes")
 */
// class OrderController extends AbstractController
// {
    /**
     * @Route("/", name="app_back_order_index", methods={"GET"})
     */
//     public function index(OrderRepository $orderRepository): Response
//     {
//         return $this->render('back/order/index.html.twig', [
//             'orders' => $orderRepository->findAll(),
//         ]);
//     }
// }