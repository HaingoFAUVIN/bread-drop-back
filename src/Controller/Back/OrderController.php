<?php

namespace App\Controller\Back;

use App\Repository\OrderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/back/commandes")
 */
class OrderController extends AbstractController
{
    /**
     * @Route("/", name="app_back_order_index", methods={"GET"})
     */
    public function index(OrderRepository $orderRepository): Response
    {
        return $this->render('back/order/index.html.twig', [
            'orders' => $orderRepository->findAll(),
        ]);
    }
}
