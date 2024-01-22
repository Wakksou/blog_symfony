<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\ingredient;
;

class IngredientFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $ingredients=array('Saumon','Fromage','Beurre','Lait');
        $images=array('https://i.goopics.net/57nidl.jpg','https://i.goopics.net/c8s7qw.jpg','https://i.goopics.net/igyn23.jpg','https://i.goopics.net/cmgq1y.jpg');
        for ($i=0;$i<=3;$i++)
        {
            $ingredient= new Ingredient();
            $ingredient->setNom($ingredients[$i])
                ->setImage($images[$i]);

            $manager->persist($ingredient);
        }

        $manager->flush();
    }
}
