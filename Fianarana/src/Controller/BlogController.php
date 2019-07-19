<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Client;
class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index()
    {
        $repo=$this->getDoctrine()->getRepository(Client::class);
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }
/**
 * @route("/", name="home")
 */
 
    public function home(){
        return $this->render('blog/home.html.twig');
    }

    
    /**  
    *@Route("/", name="")
    */

    /* public function show($id){
      $repo=$this->getDoctrine()->getRepository(Client:: class);
      $article= $repo->find($id);
      return $this->render('blog/show.html.twig');
      }
 */
  
    
}

