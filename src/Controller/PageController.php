<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use App\Repository\PageRepository;
class PageController extends AbstractController
{
    /**
     * @Route("/page", name="app_page")
     */
    public function index(PageRepository $pagesRepo, SerializerInterface $serializer): JsonResponse
    {
        $pages = $pagesRepo->findAll();

        foreach ($pages as $page) {
            $serializedPage[] = json_decode($serializer->serialize($page, 'json', ['groups' => 'page']), true);
        }
        if(empty($serializedPage)){
            return new JsonResponse("no existing pages found");
        }
        return new JsonResponse($serializedPage, 200, [], true);
    }

    #[@Route('/test', name: 'page_test', methods: 'GET')]

    public function testPage (Json $Test): JsonResponse{
        $data = file_get_contents("./Content.json");
        
        return new JsonResponse($data, 200, [], true);
    }
    #[Route('/get-page/{uuid}', name: 'api_page_list', methods: 'GET')]
    public function detailsPage(string $uuid, PageRepository $pagesRepo, SerializerInterface $serializer): JsonResponse
    {
        $page = $pagesRepo->find($uuid);

        if (!$page) {
            return $this->json(['error' => 'Page not found'], JsonResponse::HTTP_NOT_FOUND);
        }

        $serializedArt = $serializer->serialize($page, 'json', ['groups' => 'page']);

        return new JsonResponse($serializedArt, 200, [], true);
    }
    #[Route('/list-pages', name: 'api_page_list', methods: 'GET')]
    public function listPages(PageRepository $pagesRepo, SerializerInterface $serializer): JsonResponse
    {
        $pages = $pagesRepo->findAll();

        foreach ($pages as $page) {

            $serializedPage[] = json_decode($serializer->serialize($page, 'json', ['groups' => 'page']), true);
           
        }

        return new JsonResponse($serializedPage, 200, [], true);
    }
}
