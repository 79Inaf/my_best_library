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
    }

    #[Route('/home/index/', name: 'app_home_index', methods: ['GET'])]
    public function list(BookRepository $bookRepository): Response
    {
        return $this->render('home/list.html.twig', [
            'books' => $bookRepository->findAll(),
        ]);
    }

    #[Route('/home/book/{id}', name: 'app_home_show', methods: ['GET'])]
    public function show(Book $book): Response
    {
        return $this->render('home/show.html.twig', [
            'book' => $book,
        ]);
    }
}
