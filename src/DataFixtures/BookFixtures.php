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
            ['L\'assassin royal - tome1 - l\'apprenti assassin ', 'Lorsque le jeune Fitz est conduit
                à la cour des Six-Duchés, il ne sait pas encore que sa vie -
                et celle du royaume tout entier - va s\'en trouver bouleversée. Le roi-servant Chevalerie,
                père de cet enfant illégitime, devra renoncer au trône
                pour ne pas entacher la réputation de la famille royale... ', 1995, 'Fantasy', 510,
                'Le meilleur roman de
                fantasy au monde ! 1er tome
                d\'une série à dévorer', 'https://www.babelio.com/couv/CVT_15529_834672.jpg', 'Hobb'],
            ['Les enfants de la terre : Le clan de l\'ours des cavernes, La vallée des chevaux,
                Les chasseurs de mammouths',
                'Il y a 35 000 ans, une longue période
                glaciaire s\'achève et la Terre commence à se réchauffer. L\'homme s\'est peu à peu dégagé
                de la bête et il apparaît à peu près tel qu\'il est aujourd\'hui.
                En ces premiers temps du monde, Ayla, une fillette de 5 ans, échappe à un tremblement de
                terre et se sort
                des griffes d\'un lion pour se réfugier auprès
                d\'un clan étranger. On l\'adopte. Très vite, les gestes et les paroles d\'Ayla suscitent
                l\'étonnement et
                l\'inquiétude.', 1980, 'Fiction préhistorique',
                1000, 'Un chef d\'oeuvre', 'https://images2.medimops.eu/product/d7ad61/M02258034965-large.jpg',
                'Auel'],
            ['L\'assassin royal - tome2 - l\'apprenti assassin ', 'Lorsque le jeune Fitz est conduit à la
                cour des Six-Duchés,
                il ne sait pas encore que sa vie -
                et celle du royaume tout entier - va s\'en trouver bouleversée. Le roi-servant Chevalerie, père de
                cet enfant illégitime, devra renoncer au trône
                pour ne pas entacher la réputation de la famille royale... ', 1995, 'Fantasy', 510, 'Le meilleur
                roman de fantasy au monde ! 1er tome
                d\'une série à dévorer', 'https://www.babelio.com/couv/CVT_15529_834672.jpg', 'Hobb'],
            ['Les enfants de la terre intégral : Le clan de l\'ours des cavernes, La vallée des chevaux,
                Les chasseurs de mammouths',
                'Il y a 35 000 ans, une longue période
                glaciaire s\'achève et la Terre commence à se réchauffer. L\'homme s\'est peu à peu dégagé
                de la bête et
                il apparaît à peu près tel qu\'il est aujourd\'hui.
                En ces premiers temps du monde, Ayla, une fillette de 5 ans, échappe à un tremblement
                de terre et se sort
                des griffes d\'un lion pour se réfugier auprès
                d\'un clan étranger. On l\'adopte. Très vite, les gestes et les paroles d\'Ayla suscitent
                l\'étonnement et
                l\'inquiétude.', 1980, 'Fiction préhistorique',
                1000, 'Un chef d\'oeuvre', 'https://images2.medimops.eu/product/d7ad61/M02258034965-large.jpg',
                'Auel'],
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
