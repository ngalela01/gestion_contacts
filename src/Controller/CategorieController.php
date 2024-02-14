<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    /**
     * @Route("/categories", name="categories")
     */
    public function categories(CategorieRepository $repo): Response
    {
        $categories=$repo->findAll();
        return $this->render('categorie/categories.html.twig', [
           "categories"=>$categories
        ]);
    }

/**
     * @Route("/categorie/{id}", name="categorie",methods={"GET"})
     */
    public function categorie($id, CategorieRepository $repo): Response
    {
        $categorie=$repo->find($id);
        return $this->render('categorie/categorie.html.twig', [
           "categorie"=>$categorie
        ]);
    }


    
}