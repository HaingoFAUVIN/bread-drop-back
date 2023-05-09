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
     * @Route("", name="browse", methods={"GET"})
     */
    public function browse(ProductRepository $productRepository): JsonResponse
    {
        $allProducts = $productRepository->findAll();

        return $this->json($allProducts, 200, [],["groups" => ["product_list", "categorie_show", "bakery_show"]] );
    }

    /**
     * @Route("/{id}", name="read", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function read($id, ProductRepository $productRepository): JsonResponse
    {
        $product =$productRepository->find($id);

        if ($product === null){return $this->json("message d'erreur",Response::HTTP_NOT_FOUND);}

        return $this->json($product, 200, [], ["groups" => ["product_read", "categorie_show",]]);
    }
}
