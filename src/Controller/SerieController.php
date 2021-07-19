<?php

namespace App\Controller;

use App\Entity\Serie;
use App\Form\SerieType;
use App\Repository\SerieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFundation\Request;
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
    public function create(
        Request $request,
        EntityManagerInterface $entityManager
    ): Response
    {
       $serie= new Serie();
        $serie->setDateCreated(new\DateTime());
       $serieForm= $this->createForm(SerieType :: class, $serie);


       $serieForm->handleRequest($request);

       if ($serieForm->isSubmitted()){


            $entityManager->persist($serie);
            $entityManager->flush();

            $this->addFlash('success','Serie added!good job.');
            return $this->redirectToRoute('serie_details');
       }


        return $this->render('series/create.html.twig',[
            'serieForm'=> $serieForm-> createView()
            ]);
    }

}
