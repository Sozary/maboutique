<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/nous-contacter", name="contact")
     */
    public function index(Request $request): Response
    {
        $form=$this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $this->addFlash('notice','Merci de nous avoir contacté. Notre équipe va vous répondre dans les meilleurs délais');
           // envoie de mail du client brancher une api zendex
            // recuperer ici
        }
        return $this->render('contact/index.html.twig',[
            'form' => $form->createView()
        ]);
    }
}
