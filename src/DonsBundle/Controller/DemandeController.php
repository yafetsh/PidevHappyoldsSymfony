<?php

namespace DonsBundle\Controller;

use DonsBundle\Entity\Demande;
use DonsBundle\Form\DemandeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DemandeController extends Controller
{
    public function ajoutdemandeAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $m = new Demande();
        $Form = $this->createForm(DemandeType::class, $m);
        $Form->handleRequest($request);
        if ($Form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($m);
            $em->flush();


        }
        return $this->render('@Dons/Demande/ajoutdemande.html.twig', array('form' => $Form->createView()));


    }
    public function ajoutquantitedemandeAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $m = new Demande();
        $Form = $this->createForm(DemandeType::class, $m);
        $Form->handleRequest($request);
        if ($Form->isSubmitted()) {
            $m->
            $em = $this->getDoctrine()->getManager();
            $em->persist($m);
            $em->flush();


        }
        return $this->render('@Dons/Demande/ajoutdemande.html.twig', array('form' => $Form->createView()));


    }
    public function afficherdemandeAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $m = new Demande();
        $Form = $this->createForm(DemandeType::class, $m);
        $Form->handleRequest($request);
        if ($Form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($m);
            $em->flush();
            return $this->redirectToRoute('afficherdemande');

        }


        //em(entitymanager) son role de gérer les entités
        $em = $this->getDoctrine()->getManager();
        $demande = $em->getRepository("DonsBundle:Demande")->findAll();
        return $this->render('@Dons/Demande/affichedemande.html.twig', array('m' => $demande,'form' => $Form->createView()));

    }


    public function deletedemandeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $demande = $em->getRepository("DonsBundle:Demande")->find($id);
        $em->remove($demande);
        $em->flush();
        return $this->redirectToRoute('afficherdemande');
    }



    public function modifdemandeAction(\Symfony\Component\HttpFoundation\Request $request,$id){
        $em = $this->getDoctrine()->getManager();
        $demande = $em->getRepository("DonsBundle:Demande")->find($id);
        $Form = $this->createForm(DemandeType::class, $demande);
        $Form->handleRequest($request);
        if ($Form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('afficherdemande');

        }
        return $this->render('@Dons/Demande/ajoutdemande.html.twig', array('form' => $Form->createView()));

    }
    public function afficheAction()
    {
        $em = $this->getDoctrine()->getManager();
        $demande = $em->getRepository("DonsBundle:Demande")->findAll();
        return $this->render('@Dons/Demande/affichedemande.html.twig', array('m' => $demande,'form' => $Form->createView()));
    }





}
