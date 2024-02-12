<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AcceuilController extends AbstractController
{
    /**
     * @Route("/", name="app_acceuil", methods={"GET"})
     */
    public function index(): Response
    {   $age=17;
        $nomsStudents=['mohamed','lucie','marie','jean'];
        return $this->render('acceuil/index.html.twig', [
            // 'controller_name' => 'AcceuilController',
        'lesNoms'=>$nomsStudents
            ,'age'=>$age]);
        
    }
}