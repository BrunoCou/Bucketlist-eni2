<?php
namespace App\Controller;

use App\Entity\Wish;
use Doctrine\ORM\EntityManagerInterface;
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

    /**
     * @Route ("/insertNewDonnees") , name="Main_insert"
     * @param EntityManagerInterface $entityManager
     */
    public function donneeEntre(EntityManagerInterface $entityManager){
//        $sujet = new Wish();
//        $sujet->setTitle('Acheter une maison à la campagne');
//        $sujet->setAuthor('Vivi');
//        $sujet->setIsPublished(true);
//        $sujet->setDescription('Pour être peinard sans voisins! ');
//        $sujet->setDateCreataed(new \DateTime());
//
//
//        $sujet2 = new Wish();
//        $sujet2->setTitle('Faire le PC pour la belle mere');
//        $sujet2->setAuthor('Jean');
//        $sujet2->setIsPublished(false);
//        $sujet2->setDescription('pour voir quel effet ça fait');
//        $sujet2->setDateCreataed(new \DateTime());
//
//        $entityManager->persist($sujet);
//        $entityManager->persist($sujet2);
//
//        $entityManager->flush();
    return $this->redirectToRoute("app_main_home");
    }


}

