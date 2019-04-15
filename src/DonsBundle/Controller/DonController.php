<?php

namespace DonsBundle\Controller;

use DonsBundle\Entity\Don;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DonController extends Controller
{
    public function afficherdlistedemandeAction(\Symfony\Component\HttpFoundation\Request $request)
    {

        //em(entitymanager) son role de gérer les entités
        $em = $this->getDoctrine()->getManager();
        $demande = $em->getRepository("DonsBundle:Demande")->findAll();

        /**
         * @var $paginator \knp\Component\Pager\Paginator
         */
        $paginator=$this->get('knp_paginator');
        $result=$paginator->paginate(
            $demande,
            $request->query->getInt('page',1),
            $request->query->getInt('limut',5)

        );
        return $this->render('@Dons/Don/participerdon.html.twig', array('m' => $result));

    }

    public function affecterdonAction(\Symfony\Component\HttpFoundation\Request $request){



        $dons=new Don();
        if($request->isMethod('POST')) {
            //handlde request
            $dons->setQuantiteDon($request->get('quantite'));
            //handleRequest
            $em = $this->getDoctrine()->getManager();
            $em->persist($dons);
            $em->flush();
            return $this->redirectToRoute('participedon');

        }
        return $this->render('@Dons/Don/affecterdon.html.twig');



    }
}
