<?php

namespace App\Controller;

use App\Entity\Wish;
use App\Form\WishType;
use App\Repository\WishRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WishController extends AbstractController
{
    /**
     * @Route("/wish/list", name="wish_list")
     */
    public function list(WishRepository $wishRepository): Response
    {
        $wishs = $wishRepository->findBy(
            ["isPublished"=> true],
            ["dateCreataed"=> "DESC"]
        );

        return $this->render('wish/list.html.twig',[
            'wishs' => $wishs
        ]);
    }

    /**
     * @Route("/wish/detail/{id}", name="wish_detail", methods={"GET"}, requirements={"id": "[0-9]+"})
     */
    public function detail($id, WishRepository $wishRepository): Response
    {
        $detail = $wishRepository->find($id);

        return $this->render('wish/detail.html.twig', [
            "detail" => $detail
        ]);
    }

    /**
     * @Route("/wish/create", name="wish_create")
     */
    public function addWish(Request $request,EntityManagerInterface $entityManager): Response
    {
        // créer une instance
        $wish = new Wish();

        // hydrater les propriété qui vont manquer
        $wish->setDateCreataed(new \DateTime());
        $wish->setIsPublished(true);

       // créer une instance du form en lui associant notre entité
        $form = $this->createForm(WishType::class, $wish);

        //prend les données du formulaire soumis et les hydrate dans mon entité
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){


            //declenche l'insert dans la BDD
            $entityManager->persist($wish);
            $entityManager->flush();

            $this -> addFlash('succes','Vous avez créer le wish');

            return $this->redirectToRoute('wish_detail', ["id"=>$wish->getId()]);
        }

        //affiche la page twig
        return $this->render('wish/create.html.twig', [
            "wishform" => $form->createView()
        ]);
    }

}
