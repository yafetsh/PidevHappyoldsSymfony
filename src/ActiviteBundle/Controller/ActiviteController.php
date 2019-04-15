<?php

namespace ActiviteBundle\Controller;

use ActiviteBundle\Entity\Activite;
use ActiviteBundle\Form\ActiviteType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ActiviteController extends Controller


{


    public function listacAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $activites = $em->getRepository('ActiviteBundle:Activite')->findAll();
        return $this->render('ActiviteBundle:activite:listac.html.twig', array(
            'activites' => $activites ,
        ));
    }


    public function showdetailedAction($id,Activite $activite)
    {
        $em= $this->getDoctrine()->getManager();
        $p=$em->getRepository('ActiviteBundle:Activite')->find($id);
        return $this->render('ActiviteBundle:activite:detailedac.html.twig', array(
            'title'=>$p->getNomActivite(),
            'date'=>$p->getDateActivite(),
            'photo'=>$p->getPhoto(),
            'activite' => $activite,
            'descripion'=>$p->getDescriptionActivite(),
            'posts'=>$p,
            'comments'=>$p,
            'id'=>$p->getIdActivite()
        ));
    }

        public function showacAction(Activite $activite)
    {



        return $this->render('ActiviteBundle:activite:showac.html.twig', array(
            'activite' => $activite ,

        ));
    }



    public function afficheacAction()
    {
        $em = $this->getDoctrine()->getManager();

        $activites = $em->getRepository('ActiviteBundle:Activite')->findAll();

        return $this->render('ActiviteBundle:activite:afficheac.html.twig', array(
            'activites' => $activites,
        ));
    }

    public function ajouteacAction(Request $request)

    {
        $activite = new Activite();
        $Form = $this->createForm(ActiviteType::class, $activite);
        $Form->handleRequest($request);

        if ($Form->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $file = $activite->getPhoto();
            $filename= md5(uniqid()) . '.' . $file->guessExtension();
            $file->move($this->getParameter('photos_directory'), $filename);
            $activite->setPhoto($filename);

            $em->persist($activite);
            $em->flush();

            return $this->redirectToRoute('affiche_ac');


        }

        return $this->render('ActiviteBundle:activite:ajouteac.html.twig', array('form' => $Form->createView()));
    }

    public function deleteacAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $activite = $em->getRepository("ActiviteBundle:Activite")->find($id);
        $em->remove($activite);
        $em->flush();

        return $this->redirectToRoute('affiche_ac');
    }

    public function updateacAction(Request $request, $id)

    {
        $em = $this->getDoctrine()->getManager();
        $activite = $em->getRepository("ActiviteBundle:Activite")->find($id);
        $Form = $this->createForm(ActiviteType::class, $activite);
        $Form->handleRequest($request);
        if ($Form->isSubmitted()) {


            $file = $activite->getPhoto();
            $filename= md5(uniqid()) . '.' . $file->guessExtension();
            $file->move($this->getParameter('photos_directory'), $filename);
            $activite->setPhoto($filename);

            $em->persist($activite);
            $em->flush();

            return $this->redirectToRoute('affiche_ac');

        }

        return $this->render('ActiviteBundle:activite:editac.html.twig', array('form' => $Form->createView()));
    }





}
