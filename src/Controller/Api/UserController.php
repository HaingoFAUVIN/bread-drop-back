<?php

namespace App\Controller\Api;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/api/users", name="app_api_user_")
 */
class UserController extends AbstractController
{

    /**
     * @Route("", name="browse", methods={"GET"})
     */
    public function browse(UserRepository $userRepository): JsonResponse
    {
        $allUser = $userRepository->findAll();

        return $this->json($allUser, 200, [], ["groups" => [""]]);
    }

     /**
     * @Route("/{id}", name="read", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function read($id, UserRepository $userRepository): JsonResponse
    {
        $user = $userRepository->find($id);

        if ($user === null){return $this->json("message d'erreur",Response::HTTP_NOT_FOUND);}

        return $this->json($user, 200, [], ["groups" => [""]]);
    }

    /**
     * @Route("/{id}", name="edit", requirements={"id"="\d+"}, methods={"PUT", "PATCH"})
     */
    public function edit(
        $id,
        Request $request,
        UserRepository $userRepository,
        SerializerInterface $serializerInterface,
        ValidatorInterface $validatorInterface
        ): JsonResponse
    {
        $user = $userRepository->find($id);
        
        if ($user === null){return $this->json("message d'erreur",Response::HTTP_NOT_FOUND);}

        $jsonContent = $request->getContent();

        $serializerInterface->deserialize(
            $jsonContent,
            Person::class, 
            'json', 
            [AbstractNormalizer::OBJECT_TO_POPULATE => $user]);
        // ici la fusion entre l'objet BDD et l'objet JSON a été faites
        // dd($Person);

        $errors = $validatorInterface->validate($user);
        if (count($errors) > 0) {
            return $this->json($errors,Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $userRepository->add($user, true);
        
        return $this->json($user, 200, [], ["groups" => [""]]);
    }

    /**
     * @Route("", name="add", methods={"POST"})
     */
    public function add(
        UserRepository $userRepository,
        Request $request, 
        SerializerInterface $serializerInterface, 
        ValidatorInterface $validatorInterface): JsonResponse
    {
        $jsonContent = $request->getContent();
        // on reçoit aucun JSON
        if ($jsonContent === ""){return $this->json("Le contenu de la requete est invalide", Response::HTTP_BAD_REQUEST);}

        $user = $serializerInterface->deserialize($jsonContent, Person::class, 'json');

        $errors = $validatorInterface->validate($user);
        if (count($errors) > 0) {return $this->json($errors,Response::HTTP_UNPROCESSABLE_ENTITY);}

        $userRepository->add($user, true);

        return $this->json($user, 200, [], ["groups" => [""]]);
    }

    /**
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
