<?php

namespace App\Controller\Api;

use App\Repository\BakeryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
     * @Route("/api/boulangeries", name="app_api_bakery_")
*/
class BakeryController extends AbstractController
{
    /**
     * @Route("", name="browse", methods={"GET"})
     */
    public function browse(BakeryRepository $bakeryRepository): JsonResponse
    {
        $allBakeries = $bakeryRepository->findAll();

        return $this->json($allBakeries, 200, [], ["groups" => ["bakery_list", "schedule_show"]] );
    }

    /**
     * @Route("/{id}", name="read", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function read($id, BakeryRepository $bakeryRepository): JsonResponse
    {
        $bakery = $bakeryRepository->find($id);

        if ($bakery === null){return $this->json("message d'erreur",Response::HTTP_NOT_FOUND);}

        return $this->json($bakery, 200, [], ["groups" => ["bakery_read", "product_show", "categorie_show"]]);
    }
}
