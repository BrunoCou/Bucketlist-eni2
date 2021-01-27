<?php

namespace App\Controller;

use App\Form\WishType;
use App\Repository\WishRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    public function addWish(): Response
    {
        $form = $this->createForm(WishType::class);
        return $this->render('wish/create.html.twig', [
            "wishform" => $form->createView()
        ]);
    }

}
