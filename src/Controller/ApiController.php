<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    #[Route('/api/searchBooks/{search}', name: 'app_api')]
    public function search(BookRepository $bookRepository, string $search): Response
    {
        $resultSearchBooks = $bookRepository->findBookBySearch($search);

        $resultBooks = [];

        foreach ($resultSearchBooks as $resultBook) {
            $resultBooks[] = [
                'html' => $this->render(
                    'home/_cardBook.html.twig',
                    [
                        'book' => $resultBook,
                    ]
                )
            ];
        }

        return $this->json($resultBooks);
    }

    // #[Route('/api/searchBooks/', name: 'app_api_all')]
    // public function index(BookRepository $bookRepository): Response
    // {
    //     $allBooks = $bookRepository->findAll();

    //     $listBooks = [];

    //     foreach ($allBooks as $book) {
    //         $listBooks[] = [
    //             'html' => $this->render(
    //                 'home/_cardBook.html.twig',
    //                 [
    //                     'book' => $book,
    //                 ]
    //             )
    //        ];
    //     }
        // return $this->json($listBooks);
    // }
}
