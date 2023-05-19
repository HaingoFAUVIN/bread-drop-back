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
    public function index($id, BakeryRepository $bakeryRepository, OrderRepository $orderRepository): Response
    {
        //On récupère la boulangerie
        $bakery = $bakeryRepository->find($id);
        // dd($bakery);

        if ($bakery === null) {
            throw
             $this->createNotFoundException('Boulangerie non trouvée');
        }

        // On récupère les commandes de la boulangerie
        $orders = $orderRepository->findOrdersByBakery($bakery);

        return $this->render('back/order/index.html.twig', [
            // on transmet "nos" commandes 
            'orders' => $orders,
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