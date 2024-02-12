<?php

namespace App\Controller;

use App\Entity\Contacts;
use App\Repository\ContactsRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/contacts", name="contacts")
     */
    public function listeContacts(ContactsRepository $repos): Response
    {
        // $manager=$this->getDoctrine()->getManager();
        // $repo = $manager->getRepository(Contacts::class);
        $contacts = $repos -> findAll();
        return $this->render('contact/listeContacts.html.twig', [
            "contacts" =>$contacts
        ]);
    }

/**
     * @Route("/contact/{id}", name="contact", methods={"GET"})
     */
    public function ficheContact($id,ContactsRepository $repos ): Response
    {
        
        $contact = $repos -> find($id);
        return $this->render('contact/ficheContact.html.twig', [
            "lecontact" =>$contact
        ]);
    }

    
}