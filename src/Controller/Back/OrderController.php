<?php

namespace App\Controller\Back;

use App\Entity\Bakery;
use App\Repository\OrderRepository;
use App\Repository\BakeryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/back/boulangerie")
 */
class OrderController extends AbstractController
{
    /**
     * @Route("/{id<\d+>}/commandes", name="home", methods={"GET"})
     */
    public function index($id, BakeryRepository $bakeryRepository, OrderRepository $orderRepository): Response
    {
        //On récupère la boulangerie
        $bakery = $bakeryRepository->find($id);

        if ($bakery === null) {
            throw
             $this->createNotFoundException('Boulangerie non trouvée');
        }

        // On récupère les commandes de la boulangerie
        $orders = $orderRepository->findOrdersByBakery($id);

        return $this->render('back/order/index.html.twig', [
            // on transmet "nos" commandes 
            'orders' => $orders,
            'bakery' => $bakery
        ]);
    }
    /**
     * @Route("/commande/{id<\d+>}", name="app_back_order_show", methods={"GET"})
     */
    public function show($id, Bakery $bakery, OrderRepository $orderRepository): Response
    {
        //On récupère la commande
        $order = $orderRepository->find($id);
        // dd($order);

        if ($order === null) {
            throw
             $this->createNotFoundException('Commande non trouvée');
        }

        // On récupère les produits de la commande
        $products = $orderRepository->findProductsByOrder($id);
        // dd($products);

        return $this->render('back/order/show.html.twig', [
            // on transmet "nos" commandes 
            'order' => $order,
            'bakery' => $bakery,
            'products' => $products
        ]);
    }
 
}

