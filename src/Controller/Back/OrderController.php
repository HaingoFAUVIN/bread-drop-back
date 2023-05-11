<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends AbstractController
{
    /**
     * @Route("/", name="app_back_order")
     */
    public function index(): Response
    {
        return $this->render('back/order/index.html.twig', [
            'controller_name' => 'OrderController',
        ]);
    }
}
