<?php

namespace App\Controller\Back;

use App\Entity\Bakery;
use App\Form\BakeryType;
use App\Repository\BakeryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/back/boulangerie")
 */
class BakeryController extends AbstractController
{
    /**
     * @Route("/", name="app_back_bakery_index", methods={"GET"})
     */
    public function index(BakeryRepository $bakeryRepository): Response
    {
        return $this->render('back/bakery/index.html.twig', [
            'bakeries' => $bakeryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_back_bakery_new", methods={"GET", "POST"})
     */
    public function create(Request $request, BakeryRepository $bakeryRepository): Response
    {
        $bakery = new Bakery();
        $form = $this->createForm(BakeryType::class, $bakery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bakeryRepository->add($bakery, true);

            return $this->redirectToRoute('app_back_bakery_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/bakery/new.html.twig', [
            'bakery' => $bakery,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_bakery_show", methods={"GET"})
     */
    public function read(Bakery $bakery): Response
    {
        return $this->render('back/bakery/show.html.twig', [
            'bakery' => $bakery,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_back_bakery_edit", methods={"GET", "POST"})
     */
    public function update(Request $request, Bakery $bakery, BakeryRepository $bakeryRepository): Response
    {
        $form = $this->createForm(BakeryType::class, $bakery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bakeryRepository->add($bakery, true);

            return $this->redirectToRoute('app_back_bakery_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/bakery/edit.html.twig', [
            'bakery' => $bakery,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_bakery_delete", methods={"POST"})
     */
    public function delete(Request $request, Bakery $bakery, BakeryRepository $bakeryRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bakery->getId(), $request->request->get('_token'))) {
            $bakeryRepository->remove($bakery, true);
        }

        return $this->redirectToRoute('app_back_bakery_index', [], Response::HTTP_SEE_OTHER);
    }
}
