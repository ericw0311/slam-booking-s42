<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('index.html.twig');
    }

    /**
       * @Route("/admin", name="admin")
       */
    public function admin()
    {
        $connectedUser = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $userContext = new UserContext($em, $connectedUser); // contexte utilisateur
        return $this->render('admin/index.html.twig', array('userContext' => $userContext));
    }
}
