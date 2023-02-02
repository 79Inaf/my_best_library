<?php

namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(BookRepository $bookRepository): Response
    {

        return $this->render('home/index.html.twig');
        // return $this->render('home/index.html.twig', [
        //     'books' => $bookRepository->findAll(),
        // ]);
    }

    #[Route('/home/{id}', name: 'app_home_show', methods: ['GET'])]
    public function show(Book $book): Response
    {
        return $this->render('home/show.html.twig', [
            'book' => $book,
        ]);
    }
}
