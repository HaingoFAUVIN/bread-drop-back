<?php

namespace App\Controller\Back;

use App\Entity\Bakery;
use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/back/boulangerie")
 */
class ProductController extends AbstractController
{
    /**
     * @Route("/{id<\d+>}/produits", name="app_back_product_index", methods={"GET"})
     */
    public function index(Bakery $bakery, ProductRepository $productRepository): Response
    {
    // on va chercher les produits d'une boulangerie donnée
    $productByBakery = $productRepository->findBy(['bakery' => $bakery]);

    return $this->render('back/product/index.html.twig', [
        'products' => $productByBakery,
        'bakery' => $bakery,
    ]);
    }

    /**
     * @Route("{id<\d+>}/ajouter", name="app_back_product_new", methods={"GET", "POST"})
     */
    public function new(Bakery $bakery = null, Request $request, ProductRepository $productRepository): Response
    {
        // 404 ?
        if ($bakery === null) {
            throw $this->createNotFoundException('Boulangerie non trouvé');
        }

        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // on associe le produit a la boulangerie
            $product->setBakery($bakery);

            $productRepository->add($product, true);

            return $this->redirectToRoute('app_back_product_index', ['id' => $bakery->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/product/new.html.twig', [
            'product' => $product,
            'form' => $form,
            'bakery' => $bakery,
        ]);
    }

    /**
     * @Route("/{id<\d+>}/produit", name="app_back_product_show", methods={"GET"})
     */
    public function show(Product $product): Response
    {
        return $this->render('back/product/show.html.twig', [
            'product' => $product,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_back_product_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Product $product, ProductRepository $productRepository): Response
    {
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $productRepository->add($product, true);

            return $this->redirectToRoute('app_back_product_show', ['id' => $product->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/product/edit.html.twig', [
            'product' => $product,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id<\d+>}/produit", name="app_back_product_delete", methods={"POST"})
     */
    public function delete( Request $request, Product $product, ProductRepository $productRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$product->getId(), $request->request->get('_token'))) {
            $productRepository->remove($product, true);
        }

        return $this->redirectToRoute('app_back_product_index', ['id' => $product->getBakery()->getId()], Response::HTTP_SEE_OTHER);
    }
}
