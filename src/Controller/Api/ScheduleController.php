<?php

namespace App\Controller\Api;

use App\Repository\ScheduleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
     * @Route("/api/horraires", name="app_api_schedule_")
*/
class ScheduleController extends AbstractController
{
    /**
     * renvoit la liste des horaires
     * 
     * @Route("", name="browse", methods={"GET"})
     */
    public function browse(ScheduleRepository $scheduleRepository): JsonResponse
    {
        $allSchedules = $scheduleRepository->findAll();

        return $this->json(
            // les donnée a renvoyer : la transformation en json est automatique
            $allSchedules,
            // code HTTP
            200,
            //pas d'entêtes particulière
            [],
            // contexte
            [
                "groups" =>
                [
                    //je veut les propriété de ses groupes
                    "schedule_show",
                    "bakery_show_id"
                ]
            ] 
        );
    }

    /**
     * renvoit une horraire spécifique a une boulangerie
     * 
     * @Route("/{id}", name="read", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function read($id, ScheduleRepository  $scheduleRepository): JsonResponse
    {
        $schedule = $scheduleRepository->find($id);

        //gestion de la 404
        if ($schedule === null)
        {   //renvoi du json
            return $this->json(
                //les données à renvoyer : la transformation en json est automatique
                "Boulangerie non trouvé",
                // 2. code HTTP : 404
                Response::HTTP_NOT_FOUND
            );
        }

        return $this->json(
            // les données à renvoyer : la transformation en json est automatique
            $schedule,
            // code HTTP
            200, 
            // 3. pas d'entêtes particulière
            [], 
            //le contexte
            [
                "groups" => 
                [
                    //je veut les propriété de ses groupes
                    "schedule_read",
                    "bakery_show_id"
                ]
            ]
        );
    }
}

