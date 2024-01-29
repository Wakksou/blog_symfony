<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Recette;
use App\Entity\Quantites;
use App\Entity\Ingredient;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
;

class QuantitesFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $nom=array('Lasagne','Pate carbo','Soupe de poisson','Les fesses de tibo');
        $description=array('Super','Génial','Wow','miam');
        $image=array('https://i.goopics.net/omcpm0.jpg','https://i.goopics.net/omcpm0.jpg','https://i.goopics.net/omcpm0.jpg','https://i.goopics.net/omcpm0.jpg');
        $temps=array(30,60,30,360);
        $etape=array("etape 1" => "description","etape 2" => "preparation","etape 3" => "cuisson","etape 4" => "degustation");
        $quantites=array("une cueillere a soupe" , "une pincee de sel","2 pincee de poivre","30 cl de huile de tournesol");
        $ingredients=array('Saumon','Fromage','Beurre','Lait');
        $images=array('https://i.goopics.net/57nidl.jpg','https://i.goopics.net/c8s7qw.jpg','https://i.goopics.net/igyn23.jpg','https://i.goopics.net/cmgq1y.jpg');
        for ($i=0;$i<=3;$i++)
        {
            $quantite= new Quantites();
            $quantite->setQuantites($quantites[$i]);
            $recette= new Recette();
            $recette->setNom($nom[$i])
                ->setImage($image[$i])
                ->setDescription($description[$i])
                ->setTemps($temps[$i])
                ->setImage($image[$i])
                ->setEtape($etape);

                $user= new User();
                $user->setPseudo("Boug$i")
                ->setEmail("Boug$i@gmail.com")
                ->setPassword($this->passwordHasher->hashPassword($user,"motdepasse"))
                ->setAge(34)
                ->setVille("Ville$i");
                
                $ingredient= new Ingredient();
                $ingredient->setNom($ingredients[$i])
                ->setImage($images[$i]);

                $quantite->setIngredient($ingredient);
                $recette->setAuteur($user);

            $quantite->setRecette($recette);
            $manager->persist($user);
            $manager->persist($recette);
            $manager->persist($ingredient);
            $manager->persist($quantite);
        }

        $manager->flush();
    }
}
