<?php

namespace App\DataFixtures;

use App\Entity\Author;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AuthorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $authors = [
            ['Robin', 'Hobb'],
            ['Jean', 'Auel'],
            ['Daniel', 'Pennac'],
            ['Victoire', 'Tuaillon'],
            ['Maxime', 'Chattam'],
        ];

        foreach ($authors as $person) {
            $author = new Author();
            $author->setFirstname($person[0]);
            $author->setLastName($person[1]);
            $this->addReference('author_' . $person[1], $author);
            $manager->persist($author);
        }

        $manager->flush();
    }
}
