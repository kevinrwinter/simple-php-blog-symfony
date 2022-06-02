<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Post;
use App\Form\PostFormType;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PostsController extends AbstractController
{
    private $em;
    private $postRepository;
    public function __construct(PostRepository $postRepository, EntityManagerInterface $em)
    {
        $this->postRepository = $postRepository;
        $this->em = $em;
    }


    #[Route('/', name: 'app_posts')]
    public function index(): Response
    {
        $posts = $this->postRepository->findAll();

        return $this->render('posts/index.html.twig', [
            'posts' => $posts
        ]);
    }


    #[Route('/posts/create', name: 'create_post')]
    public function create(Request $request): Response
    {
        $post = new Post();
        $form = $this->createForm(PostFormType::class, $post);

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) { 
            $newPost = $form->getData();

            $imagePath = $form->get('imagePath')->getData();
            if ($imagePath) {
                $newFileName = uniqid() . '.' . $imagePath->guessExtension();

                try {
                    $imagePath->move(
                        $this->getParameter('kernel.project_dir') . '/public/uploads', $newFileName
                    );
                } catch (FileException $e) {
                    return new Response($e->getMessage());
                }

                $newPost->setImagePath('/uploads/' . $newFileName);
            }

            $this->em->persist($newPost);
            $this->em->flush();

            return $this->redirectToRoute('app_posts');
        }

        return $this->render('posts/create.html.twig', [
            'form' => $form->createView()
        ]);
    }


    #[Route('/posts/edit/{id}', name: 'edit_post')]
    public function edit($id, Request $request): Response
    {
        $post = $this->postRepository->find($id);
        $form = $this->createForm(PostFormType::class, $post);

        $form->handleRequest($request);
        $imagePath = $form->get('imagePath')->getData();

        if ($form->isSubmitted() && $form->isValid()) {
            if ($imagePath) {
                if ($post->getImagePath() !== null) {
                    if (file_exists(
                        $this->getParameter('kernel.project_dir') . $post->getImagePath()
                        )) {
                            $this->getParameter('kernel.project_dir') . $post->getImagePath();
                    }
                    $newFileName = uniqid() . '.' . $imagePath->guessExtension();

                    try {
                        $imagePath->move(
                            $this->getParameter('kernel.project_dir') . '/public/uploads',
                            $newFileName
                        );
                    } catch (FileException $e) {
                        return new Response($e->getMessage());
                    }

                    $post->setImagePath('/uploads/' . $newFileName);
                    $this->em->flush();

                    return $this->redirectToRoute('app_posts');
                }
            } else {
                $post->setTitle($form->get('title')->getData());
                $post->setAuthor($form->get('author')->getData());
                $post->setSubject($form->get('subject')->getData());
                $post->setBody($form->get('body')->getData());

                $this->em->flush();
                return $this->redirectToRoute('app_posts');
            }
        }

        return $this->render('posts/edit.html.twig', [
            'post' => $post,
            'form' => $form->createView()
        ]);
    }


    #[Route('/posts/delete/{id}', methods: ['GET', 'DELETE'], name: 'delete_post')]
    public function delete($id): Response
    {
        $post = $this->postRepository->find($id);
        $this->em->remove($post);
        $this->em->flush();

        return $this->redirectToRoute('app_posts');
    }


    #[Route('/posts/{id}', methods: ['GET'], name: 'view_post')]
    public function view($id): Response
    {
        $post = $this->postRepository->find($id);

        return $this->render('posts/view.html.twig', [
            'post' => $post
        ]);
    }
}
