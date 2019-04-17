<?php

namespace DonsBundle\Controller;

use DonsBundle\Entity\Demande;
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




    public function affecterdonAction(\Symfony\Component\HttpFoundation\Request $request,$idcategorie, $decriptiondemande,$iddemande)
    {


        $em = $this->getDoctrine()->getManager();
        $demande = $em->getRepository("DonsBundle:Demande")->find($iddemande);
        $categorie = $em->getRepository("DonsBundle:CategorieDemande")->find($idcategorie);



        $don=new Don();
        if($request->isMethod('post')) {
            //handlde request


            $don->setIdDonCategorie($categorie);
            $don->setQuantiteDon($request->get('quantite'));


            $don->setDescriptionDon($decriptiondemande);
            $don->setIdDemande($demande);

            $em = $this->getDoctrine()->getManager();
            $em->persist($don);
            $em->flush();
            // return $this->redirectToRoute('participedon');

            $demande->setQuantiteDemande($demande->getQuantiteDemande()-$don->getQuantiteDon());
            $em = $this->getDoctrine()->getManager();
            $em->persist($demande);
            $em->flush();

           if($demande->getQuantiteDemande()<= 0){
                $em = $this->getDoctrine()->getManager();
                $em->remove($demande);
                $em->flush();
            }

                return $this->redirectToRoute('participedon');


        }



        //em(entitymanager) son role de gérer les entités
        //$em=$this->getDoctrine()->getManager();
       // $demande=$em->getRepository("DonsBundle:Demande")->findAll();
        return $this->render('@Dons/Don/affecter.html.twig');





    }

    public function modiferQntiteDon(\Symfony\Component\HttpFoundation\Request $request){

    }
}
