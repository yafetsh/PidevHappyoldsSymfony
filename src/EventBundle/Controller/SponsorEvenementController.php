<?php

namespace EventBundle\Controller;

use EventBundle\Entity\SponsorEvenement;
use EventBundle\Form\SponsorEvenementType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class SponsorEvenementController extends Controller
{

    public function showspAction(SponsorEvenement $spevenement)
    {


        return $this->render('spevenement/showspo.html.twig', array(
            'spevenement' => $spevenement,

        ));
    }
    public function affichespoAction()
    {
        $em = $this->getDoctrine()->getManager();

        $spevenements = $em->getRepository('EventBundle:SponsorEvenement')->findAll();

        return $this->render('EventBundle:sponsorevenement:indexspo.html.twig', array(
            'spevenements' => $spevenements,
        ));
    }

    public function affichespoAdminAction()
    {
        $em = $this->getDoctrine()->getManager();

        $spevenements = $em->getRepository('EventBundle:SponsorEvenement')->findAll();

        return $this->render('EventBundle:sponsorevenement:indexspoadmin.html.twig', array(
            'spevenements' => $spevenements,
        ));
    }

    public function ajoutspoAction(Request $request)

    {
        $m = new SponsorEvenement();
        $Form = $this->createForm(SponsorEvenementType::class, $m);
        $Form->handleRequest($request);

        if ($Form->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($m);
            $em->flush();
            return $this->redirectToRoute('affichespo');


        }

        return $this->render('EventBundle:sponsorevenement:newspo.html.twig', array('form' => $Form->createView()));

    }

    public function deletespoAction($id_sp)
    {

        $em = $this->getDoctrine()->getManager();
        $spevenement = $em->getRepository("EventBundle:SponsorEvenement")->find($id_sp);
        $em->remove($spevenement);
        $em->flush();

        return $this->redirectToRoute('affichespo');
    }

    public function updatespAction(Request $request, $id_sp)

    {
        $em = $this->getDoctrine()->getManager();
        $spevenement = $em->getRepository("EventBundle:SponsorEvenement")->find($id_sp);
        $Form = $this->createForm(SponsorEvenementType::class, $spevenement);
        $Form->handleRequest($request);
        if ($Form->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            /*$spevenement = $Form->getData();
            $em->persist($spevenement);*/
            $em->flush();
            return $this->redirectToRoute('affichespo');

        }

        return $this->render('EventBundle:sponsorevenement:editspo.html.twig', array('form' => $Form->createView()));
    }
}
