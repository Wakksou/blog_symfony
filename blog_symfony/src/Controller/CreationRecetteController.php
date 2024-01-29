<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreationRecetteController extends AbstractController
{
    #[Route('/creation_recette', name: 'app_creation_recette')]
    public function index(): Response
    {
        return $this->render('creation_recette/creation_recette.html.twig', [
            'controller_name' => 'CreationRecetteController',
        ]);
    }
}
