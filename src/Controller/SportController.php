<?php

namespace App\Controller;

use App\Entity\Sport;
use App\Form\InsertFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SportController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $Sports = $this->getDoctrine()->getRepository(Sport::class)->findAll();


        return $this->render('sport/index.html.twig',
            [
                'allSports' => $Sports
            ]

        );
    }


    /**
     * @Route("/insert", name="insert")
     */
    public function insert(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $Sport = new Sport();
        $form = $this->createForm(InsertFormType::class, $Sport);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager->persist($Sport);
            $entityManager->flush();

            return $this->redirectToRoute('index');
        }


        return $this->render('sport/insert.html.twig', [
            'sport' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $Sports = $this->getDoctrine()->getRepository(Sport::class)->find($id);
        $entityManager->remove($Sports);
        $entityManager->flush();


        return $this->redirectToRoute('index');

    }

    /**
     * @Route("/edit/{id}", name="edit")
     */
    public function edit($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $Sports = $this->getDoctrine()->getRepository(Sport::class)->find($id);

        if (isset($_POST['send']))
        {
            $Sports->setName($_POST['name']);
            $Sports->setType($_POST['type']);
            $entityManager->persist($Sports);
            $entityManager->flush();

            return $this->redirectToRoute('index');

        }


        return $this->render('sport/edit.html.twig', [
            'sport' => $Sports,
        ]);


    }

}
