<?php

namespace ActiviteBundle\Controller;

use ActiviteBundle\Entity\Animateur;
use ActiviteBundle\Form\AnimateurType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;


class AnimateurController extends Controller
{


    public function ajouteanAction(Request $request)

    {
        $animateur = new Animateur();
        $Form = $this->createForm(AnimateurType::class, $animateur);
        $Form->handleRequest($request);
        $animateur->setDispo('Disponible');

        if ($Form->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $file = $animateur->getImage();
            $filename= md5(uniqid()) . '.' . $file->guessExtension();
            $file->move($this->getParameter('photos_directory'), $filename);
            $animateur->setImage($filename);
            $em->persist($animateur);
            $em->flush();

            return $this->redirectToRoute('affiche_an');


        }

        return $this->render('ActiviteBundle:animateur:ajoutean.html.twig', array('form' => $Form->createView()));
    }

    public function afficheanAction()
    {

        $em = $this->getDoctrine()->getManager();

        $animateurs = $em->getRepository('ActiviteBundle:Animateur')->findAll();

        return $this->render('ActiviteBundle:animateur:affichean.html.twig', array(
            'animateurs' => $animateurs ,

        ));
    }



    public function deleteanAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $animateur = $em->getRepository("ActiviteBundle:Animateur")->find($id);
        $em->remove($animateur);
        $em->flush();

        return $this->redirectToRoute('affiche_an');
    }

    public function updateanAction(Request $request, $id)

    {
        $em = $this->getDoctrine()->getManager();
        $animateur = $em->getRepository("ActiviteBundle:Animateur")->find($id);
        $Form = $this->createForm(AnimateurType::class, $animateur);
        $Form->handleRequest($request);
        if ($Form->isSubmitted()) {


            $em->persist($animateur);
            $em->flush();

            return $this->redirectToRoute('affiche_an"');

        }

        return $this->render('ActiviteBundle:animateur:editan.html.twig', array('form' => $Form->createView()));
    }





    public function changeadAction($id)
    {
$despo = "Nondisponible";
        $em = $this->getDoctrine()->getManager();
        $dq = $em->createQueryBuilder();
        $dq ->update('ActiviteBundle:Animateur', 'a')
            ->set('a.dispo',"'$despo'")
        ->where('a.idAnimateur  = :e')
        ->setParameter('e', $id)
        ->getQuery()
        ->execute();


        return $this->redirectToRoute('affiche_an');
    }

    public function affichelanAction()
    {
        $em = $this->getDoctrine()->getManager();

        $animateurs = $em->getRepository('ActiviteBundle:Animateur')->findAll();

        return $this->render('ActiviteBundle:animateur:listan.html.twig', array(
            'animateurs' => $animateurs,
        ));
    }





}