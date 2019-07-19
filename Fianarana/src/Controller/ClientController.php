<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Client;
use App\Repository\ClientRepository;
use Doctrine\Common\Persistence\ObjectManager;

class ClientController extends AbstractController
{
    /**
     * @Route("/client", name="client")
     */
    public function index()
    {
        return $this->render('client/index.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }

    /**
 * @route("/client/liste", name="liste_client") 
 */ 
public function listClient(){
    $listClient = $this->getDoctrine()
    ->getRepository('App:Client')
    ->findAll();
return $this->render('client/listClient.html.twig', array( 'listClient' => $listClient));
}

    /**
     * @route("/client/creation", name="create_client")
     */
    public function createClient(Request $request, ObjectManager $manager){
        $Client = new Client();
        $form = $this->createFormBuilder($Client)
                     ->add('num_compte')
                     ->add('nom_client')
                     ->add('solde')
                     ->getForm();
                     $form->handleRequest($request);
                     if($form->isSubmitted() && $form->isValid()){
                        $manager->persist($Client);
                        $manager->flush();
                     }

        return $this->render('client/createClient.html.twig',['formClient' => $form->createView()]);

    }

    /** 
     * @Route("/client/{id}/edit", name="editer_client");
    */
   
public function editClient($id, Request $request){
    
    $form = $this->createFormBuilder($Client)
                 ->add('num_compte')
                 ->add('nom_client')
                 ->add('solde')
                 ->getForm();
                 $form->handleRequest($request);
                 if($form->isSubmitted() && $form->isValid()){
                     $num_compte = $form['numCompte']->getData();
                     $nom_client = $form['numClient']->getData();
                     $solde = $form['solde']->getData();
                    $manager->persist($Client);
                    $manager->flush();
                 }

    return $this->render('edit_Client',['id' => $client->getId()]);

}

/** @Route("/client/delete/{id}",name="delete_client")
 */
public function deleteClient($id){
    
}


}
