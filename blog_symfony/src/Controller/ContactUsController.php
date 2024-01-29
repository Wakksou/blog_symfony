<?php

namespace App\Controller;

use App\Form\ContactFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactUsController extends AbstractController
{
    #[Route('/contact', name: 'app_contact_us')]
    public function index(Request $request): Response
    {
    
        $form = $this->createForm(ContactFormType::class);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $this->addFlash('success', 'message envoyé !');
            return $this->redirectToRoute('app_contact_us');
        }

        return $this->render('contact_us/index.html.twig', [
            'contactUsForm' => $form->createView(),
        ]);
    }
}
