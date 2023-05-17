<?php

namespace App\Controller\Back;

use App\Entity\User;
use App\Entity\Bakery;
use App\Entity\Product;
use App\Repository\OrderRepository;
use App\Repository\BakeryRepository;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/back/bakery")
 */
class OrderController extends AbstractController
{
    /**
     * @Route("/{id}", name="app_back_order_index", methods={"GET"})
     */
    public function index(int $id, BakeryRepository $bakeryRepository): Response
    {
        //On récupère la boulangerie du manager en cours
        $bakery = $bakeryRepository->find($id);

        // https://symfony.com/doc/current/doctrine/associations.html#joining-related-records
        // https://symfony.com/doc/current/doctrine/associations.html#fetching-related-objects

        // on va chercher les commandes passées la boulangerie du gérant en cours
        $products = $bakery->getProduct();

        return $this->render('back/order/index.html.twig', [
            'orders' => $products
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