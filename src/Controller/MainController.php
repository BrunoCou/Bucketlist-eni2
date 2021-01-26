<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends  AbstractController
{
    /**
     * @Route("/") , name="Main_home"
     */

    public function home(){
      return $this->render('main\home.html.twig');
    }

    /**
     * @Route ("/AboutUs") , name="Main_contact"
     */
    public function aboutus(){
        return $this->render('main\About-us.html.twig');
    }
}

