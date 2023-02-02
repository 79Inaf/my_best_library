<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BookFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $books = [
            [
                'L\'assassin royal - tome1 - l\'apprenti assassin ',
                'Lorsque le jeune Fitz est conduit à la cour des Six-Duchés, il ne sait pas encore que sa vie - et celle du royaume tout entier - va s\'en trouver bouleversée. Le roi-servant Chevalerie, père de cet enfant illégitime, devra renoncer au trône pour ne pas entacher la réputation de la famille royale... ',
                1995,
                'Fantasy',
                510,
                'Le meilleur roman de fantasy au monde ! 1er tome d\'une série à dévorer',
                'https://products-images.di-static.com/image/robin-hobb-l-assassin-royal-tome-1-l-apprenti-assassin/9782756406053-200x303-2.webp',
                'Hobb'
            ],
            [
                'Les enfants de la terre : Le clan de l\'ours des cavernes, La vallée des chevaux, Les chasseurs de mammouths',
                'Il y a 35 000 ans, une longue période glaciaire s\'achève et la Terre commence à se réchauffer. L\'homme s\'est peu à peu dégagé de la bête et il apparaît à peu près tel qu\'il est aujourd\'hui. En ces premiers temps du monde, Ayla, une fillette de 5 ans, échappe à un tremblement de terre et se sort des griffes d\'un lion pour se réfugier auprès d\'un clan étranger. On l\'adopte. Très vite, les gestes et les paroles d\'Ayla suscitent l\'étonnement et l\'inquiétude.',
                1980,
                'Fiction préhistorique',
                1000,
                'Un chef d\'oeuvre',
                'https://images2.medimops.eu/product/d7ad61/M02258034965-large.jpg',
                'Auel'
            ],
            [
                'Les couilles sur la table',
                'Qu\'est-ce que ça veut dire d\'être un homme, en France, au XXIe siècle ? Qu\'est-ce que ça implique ? Pour dépasser les querelles d\'opinion et ne pas laisser la réponse aux masculinistes qui prétendent que "le masculin est en crise", Victoire Tuaillon s\'est emparée frontalement de la question, en s\'appuyant sur les travaux les plus récents de chercheuses et de chercheurs en sciences sociales.',
                2019,
                'Sociologie',
                255,
                'A mettre entre toutes les mains',
                'https://e-leclerc.scene7.com/is/image/gtinternet/9782757892411_1?op_sharpen=1&resmode=bilin&fmt=pjpeg&qlt=85&wid=450&fit=fit,1&hei=450',
                'Tuaillon'
            ],
            [
                'Au bonheur des ogres',
                'Le premier tome des aventures de Benjamin Malaussène, bouc émissaire de profession, et de sa tribu loufoque. Une ode au quartier populaire de Belleville doublé d\'une trépidante intrigue policière.',
                1985,
                'Roman policier',
                288,
                'Un vrai bonheur à lire !',
                'https://static.fnac-static.com/multimedia/Images/FR/NR/7d/20/00/8317/1540-1/tsp20230202100627/Au-bonheur-des-ogres.jpg',
                'Pennac'
            ],
            [
                'La fée carabine',
                'Si les vieilles dames se mettent à buter les jeunots, si les doyens du troisième âge se shootent comme des collégiens, si les commissaires divisionnaires enseignent le vol à la tire à leurs petits-enfants, et si on prétend que tout ça c\'est ma faute, moi, je pose la question : où va-t-on ?"Ainsi s\'interroge Benjamin Malaussène, bouc émissaire professionnel, payé pour endosser nos erreurs à tous, frère de famille élevant les innombrables enfants de sa mère, coeur extensible abritant chez lui les vieillards les plus drogués... ',
                1987,
                'Roman policier',
                310,
                'La suite irrésistible de "Au bonheur des ogres" ! ',
                'https://static.fnac-static.com/multimedia/Images/FR/NR/87/20/00/8327/1540-0/tsp20191025071030/La-fee-carabine.jpg',
                'Pennac'
            ]
        ];

        foreach ($books as $tome) {
            $book = new Book();
            $book->setTitle($tome[0]);
            $book->setSummary($tome[1]);
            $book->setFirstEdition($tome[2]);
            $book->setKind($tome[3]);
            $book->setNumberPages($tome[4]);
            $book->setAdvice($tome[5]);
            $book->setPicture($tome[6]);
            $book->setAuthor($this->getReference('author_' . $tome[7]));

            $manager->persist($book);
        }

        $manager->flush();
    }
}
