<?php

namespace App\Controller\Api;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * @Route("/api/utilisateurs", name="app_api_user_")
 */
class UserController extends AbstractController
{

    /**
     * @Route("", name="browse", methods={"GET"})
     */
    public function browse(UserRepository $userRepository): JsonResponse
    {
        $allUser = $userRepository->findAll();

        return $this->json(
            //les données à renvoyer : la transformation en json est automatique
            $allUser, 
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
                    "user_list",
                    "order_show"
                ]
            ]
        );
    }

     /**
     *
     * renvoit un utilisateur spécifique
     *  
     * @Route("/{id}", name="read", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function read($id, UserRepository $userRepository): JsonResponse
    {
        $user = $userRepository->find($id);

        if ($user === null)
        {
            // ! on ne doit pas renvoyer du HTML
            // * le front s'attend à avoir du JSON
            return $this->json(
                //les données à renvoyer : la transformation en json est automatique
                "message d'erreur",
                //code HTTP : 404,
                Response::HTTP_NOT_FOUND 
            );
        }

        return $this->json(
            //les données à renvoyer : la transformation en json est automatique
            $user, 
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
                    "user_read",
                    "order_show"
                ]
            ]
        );
    }

    /**
     * modifie un utilisateur
     * 
     * @Route("/{id}/modifier", name="edit", requirements={"id"="\d+"}, methods={"PUT", "PATCH"})
     */
    public function edit(
        $id,
        Request $request,
        UserRepository $userRepository,
        SerializerInterface $serializerInterface,
        ValidatorInterface $validatorInterface
        ): JsonResponse
    {
        //on récupère en BDD l'objet à modifier
        $user = $userRepository->find($id);
        
        if ($user === null){return $this->json("message d'erreur",Response::HTTP_NOT_FOUND);}

        //on récupère les informations de la requetes
        $jsonContent = $request->getContent();

        // on transforme notre json en objet
        $serializerInterface->deserialize(
            // les données de la requete
            $jsonContent,
            // le type d'objet
            User::class, 
            // le format des données
            'json',
            //le contexte : l'objet que l'on veux mettre à jour avec les données
            // on modifie le comportement de la deserialisation
            // au lieur de nous créer un nouvel objet
            // il remplit l'objet qu'on lui fournit 
            [AbstractNormalizer::OBJECT_TO_POPULATE => $user]);
        // ici la fusion entre l'objet BDD et l'objet JSON a été faites

        // on valide que les informations sont valides
        // ! Si on veux modifier qu'une seule propriété
        // * la validation valide TOUTE les propriétés
        $errors = $validatorInterface->validate($user);
        if (count($errors) > 0) {
            return $this->json($errors,Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        //on fait la mise à jour
        // les propriétés ont été mise à jour par le deserialise
        // les propriétés ont été validées par le validator
        $userRepository->add($user, true);
        
        return $this->json(
            //les données à renvoyer : la transformation en json est automatique
            $user, 
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
                    "user_edit"
                ]
            ]
        );
    }

    /**
     * creer un utilisateur
     * 
     * @Route("", name="add", methods={"POST"})
     */
    public function add(
        UserRepository $userRepository,
        Request $request, 
        SerializerInterface $serializerInterface, 
        ValidatorInterface $validatorInterface,
        UserPasswordHasherInterface $passwordHasher): JsonResponse
    {
        $jsonContent = $request->getContent();
        // on reçoit aucun JSON
        if ($jsonContent === ""){
            return $this->json(
                "Le contenu de la requete est invalide",
                 Response::HTTP_BAD_REQUEST);
        }

        // on a besoin du SerializerInterface
        $user = $serializerInterface->deserialize(
            // la chaine de caractère reçu dans la requete
            $jsonContent, 
            // le type d'objet dans lequel on veux transformer le contenu
            User::class,
            // le format du contenu
            'json');

        $password = $user->getPassword();

        // hachage du password (basé" du security.yaml config de la classe $user)
        $hashedPassword = $passwordHasher->hashPassword(
            $user,
            $password
        );
        $user->setPassword($hashedPassword);

        // on a un service qui s'occupe de ça : validatorInterface
        $errors = $validatorInterface->validate($user);
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

        $userRepository->add($user, true);

        return $this->json(
            //les données à renvoyer : la transformation en json est automatique
            $user, 
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
                    "user_add"
                ]
            ]
        );
    }

    /**
     * supprime un utilisateur
     * 
     * @Route("/{id}", name="delete", requirements={"id"="\d+"}, methods={"DELETE"})
     *
     * @return JsonResponse
     */
    public function delete(
        $id,
        UserRepository $userRepository
        ): JsonResponse
    {
        // 1. aller l'objet dans la BDD
        $user = $userRepository->find($id);
        // on a pas trouvé en BDD
        if ($user === null){
            return $this->json(
                // 1. un message d'erreur
                "Aucune Person avec cet ID : " . $id,
                //2. code HTTP : 404 NOT_FOUND
                Response::HTTP_NOT_FOUND,
            );
        }
        // 2. utiliser le repository pour faire un remove
        $userRepository->remove($user, true);
        // 3. on renvoit une réponse JSON
        return $this->json(
            // 1. aucune donnée à fournir, peut être un message
            null,
            //2. code HTTP : 204 NO_CONTENT
            Response::HTTP_NO_CONTENT,
        );
    }

}
