<?php

namespace App\Controller\Api;

use App\Repository\BakeryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
     * @Route("/api/bakeries", name="app_api_bakery_")
*/
class BakeryController extends AbstractController
{
    /**
     * @Route("", name="browse", methods={"GET"})
     */
    public function browse(BakeryRepository $bakeryRepository): JsonResponse
    {
        $allBakeries = $bakeryRepository->findAll();

        return $this->json($allBakeries, 200, [], ["groups" => ["bakery_list"]] );
    }
}
