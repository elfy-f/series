<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



/**
 * @Route("/serie", name="serie_")
 */
class SerieController extends AbstractController
{



    /**
     * @Route("/serie", name="serie_list")
     */
    public function list(): Response
    {
        //todo: aller chercher les series en bdd

        return $this->render('serie/list.html.twig', [

        ]);
    }

    /**
     * @Route("/serie/details/{id}", name="serie_details")
     */
    public function details(int $id): Response
    {
    //todo: aller chercher la serie en bdd

    return $this->render('series/details.html.twig');
    }

    /**
     * @Route("/create", name="create")
     */
    public function create(int $id): Response
    {
        //todo: aller chercher la serie en bdd

        return $this->render('series/create.html.twig');
    }

}
