<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    /**
     * @Route("/page", name="app_page")
     */
    public function index(): Response
    {
        return $this->render('page/index.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }
    #[Route('/list-pages/{uuid}', name: 'api_page_list', methods: 'GET')]
    public function detailsArt(string $uuid, PageRepository $pagesRepo, SerializerInterface $serializer): JsonResponse
    {
        $page = $pagesRepo->find($uuid);

        if (!$page) {
            return $this->json(['error' => 'Page not found'], JsonResponse::HTTP_NOT_FOUND);
        }

        $serializedArt = $serializer->serialize($page, 'json', ['groups' => 'page']);

        return new JsonResponse($serializedArt, 200, [], true);
    }
}
