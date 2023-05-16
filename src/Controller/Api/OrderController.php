<?php

namespace App\Controller\Api;

use App\Entity\Order;
use App\Repository\OrderRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/api/orders", name="app_api_order_")
 */
class OrderController extends AbstractController
{

    /**
     * @Route("", name="browse", methods={"GET"})
     */
    public function browse(OrderRepository $orderRepository): JsonResponse
    {
        $allOrder = $orderRepository->findAll();

        return $this->json(
            //les données à renvoyer : la transformation en json est automatique
            $allOrder, 
            //code HTTP
            200, 
            //pas d'entêtes particulière
            [], 
            //le contexte
            // dans le contexte on précise le nom du/des groupes de serialisation
            [
                "groups" => 
                [
                    // je veux les propriétés de ce groupe
                    "order_list",
                    "product_show",
                    "user_show"
                ]
            ]
        );
    }

     /**
     *
     * renvoit une commande  spécifique
     *  
     * @Route("/{id}", name="read", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function read($id, OrderRepository $orderRepository): JsonResponse
    {
        $order = $orderRepository->find($id);

        if ($order === null)
        {
            // ! on ne doit pas renvoyer du HTML
            // * le front s'attend à avoir du JSON
            return $this->json(
                //les données à renvoyer : la transformation en json est automatique
                "message d'erreur",
                //code HTTP : 404,
                Response::HTTP_NOT_FOUND
                //pas d'entêtes particulière
                [],
                // pas de contexte
                []     
            );
        }

        return $this->json(
            //les données à renvoyer : la transformation en json est automatique
            $order, 
            //code HTTP
            200, 
            //pas d'entêtes particulière
            [], 
            //le contexte
            // dans le contexte on précise le nom du/des groupes de serialisation
            [
                "groups" => 
                [
                    // je veux les propriétés de ce groupe
                    "order_read",
                    "product_show",
                    "user_show"
                ]
            ]
        );
    }

    /**
     * creer une commande
     * 
     * @Route("", name="add", methods={"POST"})
     */
    public function add(
        OrderRepository $orderRepository,
        Request $request, 
        SerializerInterface $serializerInterface, 
        ValidatorInterface $validatorInterface): JsonResponse
    {
        $jsonContent = $request->getContent();
        // on reçoit aucun JSON
        if ($jsonContent === ""){
            return $this->json(
                "Le contenu de la requete est invalide",
                 Response::HTTP_BAD_REQUEST);
        }

        // on a besoin du SerializerInterface
        $order = $serializerInterface->deserialize(
            // la chaine de caractère reçu dans la requete
            $jsonContent, 
            // le type d'objet dans lequel on veux transformer le contenu
            Order::class,
            // le format du contenu
            'json');

        // on a un service qui s'occupe de ça : validatorInterface
        $errors = $validatorInterface->validate($order);
        // on regarde si on a des erreurs dans le tableau d'erreurs en sortie de la validation
        if (count($errors) > 0) {
            // $apiError = new ApiError($errors);
            // on renvoit $apiError->getAllMessage()

            // on renvoit le tableau d'erreurs au format JSON
            // on y ajoute un code HTTP d'erreur : 422 UNPROCESSABLE_ENTITY
            return $this->json(
                //les données
                $errors,
                //le code d'erreur
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        $orderRepository->add($order, true);

        return $this->json(
            //les données à renvoyer : la transformation en json est automatique
            $order, 
            //code HTTP
            200, 
            //pas d'entêtes particulière
            [], 
            //le contexte
            // dans le contexte on précise le nom du/des groupes de serialisation
            [
                "groups" => 
                [
                    // je veux les propriétés de ce groupe
                    "order_add"
                ]
            ]
        );
    }

}
