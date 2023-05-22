<?php

namespace App\Controller\Back;

use App\Entity\Bakery;
use App\Entity\Schedule;
use App\Form\ScheduleType;
use App\Repository\ScheduleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/back/boulangerie")
 */
class ScheduleController extends AbstractController
{
    /**
     * @Route("/{id<\d+>}/horaires", name="app_schedule_index", methods={"GET"})
     */
    public function index(Bakery $bakery = null, ScheduleRepository $scheduleRepository): Response
    {
        // on va chercher les horaires d une boulangerie donné
        $scheduleByBakery = $scheduleRepository->findBy(['bakery' => $bakery]);

        return $this->render('schedule/index.html.twig', [
            'schedules' => $scheduleByBakery,
            'bakery' => $bakery,
        ]);
    }

    /**
     * @Route("/{id<\d+>}/horaire/ajouter", name="app_schedule_new", methods={"GET", "POST"})
     */
    public function new(Bakery $bakery = null, Request $request, ScheduleRepository $scheduleRepository): Response
    {
         // 404 ?
         if ($bakery === null) {
            throw $this->createNotFoundException('Boulangerie non trouvé');
        }

        $schedule = new Schedule();
        $form = $this->createForm(ScheduleType::class, $schedule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // on associe les horaires à la boulangerie
            $schedule->setBakery($bakery);

            $scheduleRepository->add($schedule, true);

            return $this->redirectToRoute('app_schedule_index', ['id' => $bakery->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('schedule/new.html.twig', [
            'schedule' => $schedule,
            'form' => $form,
            'bakery' => $bakery,
        ]);
    }

    /**
     * @Route("/{id}", name="app_schedule_show", methods={"GET"})
     */
    /* public function show(Schedule $schedule): Response
    {
        return $this->render('schedule/show.html.twig', [
            'schedule' => $schedule,
        ]);
    } */

    /**
     * @Route("/{id}/horaire/modifier", name="app_schedule_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Schedule $schedule, ScheduleRepository $scheduleRepository): Response
    {
        $form = $this->createForm(ScheduleType::class, $schedule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $scheduleRepository->add($schedule, true);

            return $this->redirectToRoute('app_schedule_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('schedule/edit.html.twig', [
            'schedule' => $schedule,
            'form' => $form,
        ]);
    }
}
