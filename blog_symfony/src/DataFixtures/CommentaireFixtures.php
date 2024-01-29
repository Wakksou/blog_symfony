<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\User;
use App\Entity\Recette;
use App\Entity\Commentaire;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
;

class CommentaireFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $nom=array('Spaguettis bolo','Croque monsieur','Purée de carotte','Les fesses de tibo');
        $description=array('Super','Génial','Wow','miam');
        $image=array('https://i.goopics.net/wez33h.jpg','https://i.goopics.net/onuwhl.jpg','https://i.goopics.net/omcpm0.jpg','https://i.goopics.net/wez33h.jpg');
        $temps=array(30,60,30,360);
        $etape=array("etape 1" => "description","etape 2" => "preparation","etape 3" => "cuisson","etape 4" => "degustation");

        for ($i=0;$i<=3;$i++)
        {
            $commentaire= new Commentaire();
            $commentaire->setDescription($description[$i]);
            $commentaire->setDate(new DateTime());

            $user= new User();
                $user->setPseudo("User$i")
                ->setEmail("User$i@gmail.com")
                ->setPassword($this->passwordHasher->hashPassword($user,"motdepasse"))
                ->setAge(34)
                ->setVille("Ville$i");

            $recette= new Recette();
            $recette->setNom($nom[$i])
                ->setImage($image[$i])
                ->setDescription($description[$i])
                ->setTemps($temps[$i])
                ->setImage($image[$i])
                ->setEtape($etape);

            $recette->setAuteur($user);
            $commentaire->setAuteur($user);
            $commentaire->setRecette($recette);

            $manager->persist($user);
            $manager->persist($recette);
            $manager->persist($commentaire);
        }

        $manager->flush();
    }
}
