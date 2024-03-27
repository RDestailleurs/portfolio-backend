<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtController extends AbstractController
{
    #[Route('/art', name: 'app_art')]
    public function index(): Response
    {
        return $this->render('art/index.html.twig', [
            'controller_name' => 'ArtController',
        ]);
    }

    #[Route('/details-art/{uuid}', name: 'api_art_details', methods: 'GET')]
    public function detailsArt(string $uuid, ArtRepository $artsRepo, SerializerInterface $serializer): JsonResponse
    {
        $art = $artsRepo->find($uuid);

        if (!$art) {
            return $this->json(['error' => 'Art not found'], JsonResponse::HTTP_NOT_FOUND);
        }

        $serializedArt = $serializer->serialize($art, 'json', ['groups' => 'art']);

        return new JsonResponse($serializedArt, 200, [], true);
    }
}
