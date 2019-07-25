<?php

namespace App\Controller;

use App\Entity\Athlete;
use App\Form\InsertAthleteType;
use DeepCopy\f001\A;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AthleteController extends AbstractController
{
    /**
     * @Route("/athlete", name="athlete")
     */
    public function index()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $athletes = $this->getDoctrine()->getRepository(Athlete::class)->findAll();

        return $this->render('athlete/index.html.twig', [
            'athletes' => $athletes,
        ]);
    }



        /**
         * @Route("/inserta", name="inserta")
         */

public function insertA(Request $request)
{

   $entityManager = $this->getDoctrine()->getManager();

   $Athlete = new Athlete();
   $formA = $this->createForm(InsertAthleteType::class, $Athlete);
    $formA->handleRequest($request);
   if ($formA->isSubmitted() && $formA->isValid())
   {
       $entityManager->persist($Athlete);
       $entityManager->flush();

       return $this->redirectToRoute('index');
   }


   return $this->render('athlete/insert.html.twig', [
       'athletes' => $formA->createView(),
   ]);
}



}
