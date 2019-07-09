<?php

namespace App\Controller;

use \DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Common\Collections\ArrayCollection;
use App\Form\ChaussureType;
use App\Form\ColaborateurType;
use App\Entity\Chaussure;
use App\Entity\Colaborateur;
use App\Entity\Taille;
use Symfony\Component\Security\Core\Security;

class FormController extends AbstractController
{

    /**
     * @Route("/chaussure", name="home")
     */
    public function home(Request $request,Security $security) : Response
    {
//        dump($security->getUser());
        $chaussure = new Chaussure();
        $chaussureForm = $this->createForm(ChaussureType::class, $chaussure);
        $chaussureForm->handleRequest($request);

        if ($chaussureForm->isSubmitted() && $chaussureForm->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($chaussure);
            $entityManager->flush();
        }

        return $this->render('chaussure.html.twig', [
            'form' => $chaussureForm->createView(),
            'button' =>'ajouter',
        ]);
    }

    /**
     * @Route("/list/chaussure", name="chaussure_show")
     */
    public function show()
    {
        $chaussures = $this->getDoctrine()->getRepository(Chaussure::class)->findAll();

        if (!$chaussures) {
            throw $this->createNotFoundException('No chaussure found');
        }

        return $this->render('list_chaussure.html.twig', [
            'lists' => $chaussures
        ]);
    }

    /**
     * @Route("/chaussure/edit/{id}", name="chaussure_edit")
     */
    public function update(Request $request, Chaussure $chaussure , $id)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $originalTailles = new ArrayCollection();

        // Create an ArrayCollection of the current Tag objects in the database
        foreach ($chaussure->getTailles() as $taille) {
            $originalTailles->add($taille);
        }

        $form = $this->createForm(ChaussureType::class, $chaussure);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            foreach ($originalTailles as $taille) {
                if (false === $chaussure->getTailles()->contains($taille)) {
                    $entityManager->remove($taille);
                    $entityManager->flush();
                }
            }
            $entityManager->persist($chaussure);

            $entityManager->flush();

            return $this->redirectToRoute('chaussure_edit',['id'=>$id]);
        }

        return $this->render('chaussure.html.twig', [
            'form' => $form->createView(),
            'button' => 'modifier',
        ]);
    }

    /**
     * @Route("/colaborateur", name="colaborateur_form")
     */
    public function colaborateur(Request $request){
        $colaborateur = new Colaborateur();
        $colaborateurForm = $this->createForm(ColaborateurType::class, $colaborateur);
        $colaborateurForm->handleRequest($request);

        if ($colaborateurForm->isSubmitted() && $colaborateurForm->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($colaborateur);
            $entityManager->flush();
        }

        return $this->render('Colaborateur.html.twig', [
            'form' => $colaborateurForm->createView(),
            'button' =>'ajouter',
        ]);
    }
}