<?php

namespace App\Controller;

use App\Entity\Versement;
use App\Form\VersementType;
use App\Repository\VersementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/versement")
 */
class VersementController extends AbstractController
{
    /**
     * @Route("/", name="versement_index", methods={"GET"})
     */
    public function index(VersementRepository $versementRepository): Response
    {
        return $this->render('versement/index.html.twig', [
            'versements' => $versementRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="versement_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $versement = new Versement();
        $form = $this->createForm(VersementType::class, $versement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($versement);
            $entityManager->flush();

            return $this->redirectToRoute('versement_index');
        }

        return $this->render('versement/new.html.twig', [
            'versement' => $versement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="versement_show", methods={"GET"})
     */
    public function show(Versement $versement): Response
    {
        return $this->render('versement/show.html.twig', [
            'versement' => $versement,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="versement_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Versement $versement): Response
    {
        $form = $this->createForm(VersementType::class, $versement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('versement_index', [
                'id' => $versement->getId(),
            ]);
        }

        return $this->render('versement/edit.html.twig', [
            'versement' => $versement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="versement_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Versement $versement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$versement->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($versement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('versement_index');
    }
}
