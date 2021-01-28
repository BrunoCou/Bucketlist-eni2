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
        $faker = \Faker\Factory::create("fr_FR");
        $faker->sentence;
        $faker->name;
        $faker->paragraph;



        $sujet2 = new Wish();
        $sujet2->setTitle($faker->sentence);
        $sujet2->setAuthor($faker->name);
        $sujet2->setIsPublished(true);
        $sujet2->setDescription($faker->paragraph);
        $sujet2->setDateCreataed(new \DateTime());

 //       $entityManager->persist($sujet);
        $entityManager->persist($sujet2);
//
        $entityManager->flush();
    return $this->redirectToRoute("app_main_home");
    }


}

