<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostsController extends AbstractController
{
    #[Route('/posts', name: 'app_posts')]
    public function index(): Response
    {
        return $this->render('index.html.twig', [
            'title' => 'First blog post title',
            'author' => 'A.N. Author',
            'date' => '01-06-2022',
            'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorem vitae incidunt sit, voluptate, quae, hic eveniet repellendus facere sint doloribus tempora aspernatur explicabo sunt aperiam distinctio praesentium quis nesciunt? Non.'
        ]);
    }
}
