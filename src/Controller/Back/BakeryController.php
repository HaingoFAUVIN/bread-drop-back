<?php

namespace App\Controller\Back;

use App\Entity\Bakery;
use App\Entity\User;
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
     * @Route("/utilisateur/{id<\d+>}", name="app_back_bakery_index", methods={"GET"})
     */
    public function index(User $user = null, BakeryRepository $bakeryRepository): Response
    {
        // 404 ?
        if ($user === null) {
            throw $this->createNotFoundException('Boulangerie non trouvé');
        }

        // on va chercher les boulangerie du user donnée
        $bakeryByUser = $bakeryRepository->findBy(['user' => $user]);

        return $this->render('back/bakery/index.html.twig', [
            'bakeries' => $bakeryByUser,
            'user' => $user,
        ]);
    }

    /**
     * @Route("/ajouter/{id}", name="app_back_bakery_new", methods={"GET", "POST"})
     */
    public function create(User $user =null, Request $request, BakeryRepository $bakeryRepository): Response
    {
        // 404 ?
        if ($user === null) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
        }

        $bakery = new Bakery();
        $form = $this->createForm(BakeryType::class, $bakery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // on associe la boulangerie à l' utilisateur
            $bakery->setUser($user);

            $bakeryRepository->add($bakery, true);

            return $this->redirectToRoute('app_back_bakery_index', ['id' => $user->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/bakery/new.html.twig', [
            'bakery' => $bakery,
            'form' => $form,
            'user' => $user,
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
     * @Route("/modifier/{id}", name="app_back_bakery_edit", methods={"GET", "POST"})
     */
    public function update( Request $request, Bakery $bakery, BakeryRepository $bakeryRepository): Response
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
