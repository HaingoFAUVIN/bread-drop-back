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
     * renvoit la liste des boulangerie
     * 
     * @Route("", name="browse", methods={"GET"})
     */
    public function browse(BakeryRepository $bakeryRepository): JsonResponse
    {
        $allBakeries = $bakeryRepository->findAll();

        return $this->json(
            // les donnée a renvoyer : la transformation en json est automatique
            $allBakeries,
            // code HTTP
            200,
            //pas d'entêtes particulière
            [],
            // contexte
            [
                "groups" =>
                [
                    //je veut les propriété de ce groups
                    "bakery_list",
                    "product_show", 
                    "categorie_show"
                ]
            ] 
        );
    }

    /**
     * renvoit une boulangerie spécifique
     * 
     * @Route("/{id}", name="read", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function read($id, BakeryRepository $bakeryRepository): JsonResponse
    {
        $bakery = $bakeryRepository->find($id);

        //gestion de la 404
        if ($bakery === null)
        {   //renvoi du json
            return $this->json(
                //les données à renvoyer : la transformation en json est automatique
                "Boulangerie non trouvée",
                // 2. code HTTP : 404
                Response::HTTP_NOT_FOUND
            );
        }

        return $this->json(
            // les données à renvoyer : la transformation en json est automatique
            $bakery,
            // code HTTP
            200, 
            // 3. pas d'entêtes particulière
            [], 
            //le contexte
            [
                "groups" => 
                [
                    //je veut les propriété de ses groupes
                    "bakery_read", 
                    "product_show", 
                    "categorie_show"
                ]
            ]
        );
    }
}
