<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends  AbstractController
{
    /**
     * @Route("/") , name="Main_home"
     */

    public function home(): Response{
      return $this->render('main\home.html.twig', []);
    }

    /**
     * @Route ("/about-us") , name="Main_contact"
     */
    public function aboutUs(): Response{
        return $this->render('main\About-us.html.twig', []);
    }

    /**
     * @Route ("/legal-stuff") , name="Main_legal-stuff"
     */
    public function legalStuff(): Response{
        return $this->render('main\legal-stuff.html.twig', []);
    }
}

