<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    
    public function load(ObjectManager $manager): void
    {
        $pseudo=array('Todo','Itadori','Gojo','Sukuna');
        $mail=array('mail1@gmail.com','mail2@gmail.com','mail3@gmail.com','mail4@gmail.com');
        $age=array('25','22','44','88');
        $ville=array('Paris','Marseille','Lyon','Lille');
        $roleAdmin=array('ROLE_ADMIN');
        $roleUser=array('ROLE_USER');
        for ($i=0;$i<=3;$i++)
        {
            $User= new User();
            $User->setPseudo($pseudo[$i])
            ->setEmail($mail[$i])
            ->setPassword($this->passwordHasher->hashPassword($User,"UtilisateurPassword$i"))
            ->setAge($age[$i])
            ->setVille($ville[$i]);
            
            if ( $i!=1 ) {
                $User->setRoles($roleUser);
            }
            else { 
                $User->setRoles($roleAdmin); 
            }
            $manager->persist($User);
        }
        $manager->flush();
    }
}
