<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DocumentationController extends AbstractController
{
    /**
    * @Route("/documentation/{pageCode}", name="documentation")
    */
    public function index($pageCode)
    {
        return $this->render('documentation/index.html.twig', array('pageCode' => $pageCode));
    }
}
