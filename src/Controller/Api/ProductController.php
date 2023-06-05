<?php

namespace App\Controller\Api;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("/api/produit", name="app_api_product")
*/
class ProductController extends AbstractController
{
    /**
     * renvoit la liste des produits
     * 
     * @Route("", name="browse", methods={"GET"})
     */
    public function browse(ProductRepository $productRepository): JsonResponse
    {
        $allProducts = $productRepository->findAll();
        
        return $this->json(
            // les donnée a renvoyer : la transformation en json est automatique
            $allProducts,
            // code HTTP
            200,
            //pas d'entêtes particulière
            [],
            // contexte
            [
                "groups" => 
                [
                    //je veut les propriété de ses groupes
                    "product_list", 
                    "categorie_show", 
                    "bakery_show_id"
                ]
            ] 
        );
    }

    /**
     * renvoit un produit spécifique
     * 
     * @Route("/{id}", name="read", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function read($id, ProductRepository $productRepository): JsonResponse
    {
        $product =$productRepository->find($id);

        //gestion de la 404
        if ($product === null)
        {   //renvoi du json
            return $this->json(
                //les données à renvoyer : la transformation en json est automatique
                "message d'erreur",
                // 2. code HTTP : 404
                Response::HTTP_NOT_FOUND
            );
        }

        return $this->json(
            // les données à renvoyer : la transformation en json est automatique
            $product,
            // code HTTP
            200,
            // 3. pas d'entêtes particulière
            [],
            //le contexte
            [
                "groups" => 
                [
                    //je veut les propriété de ses groupes
                    "product_read", 
                    "categorie_show",
                ]
            ]
        );
    }
}
