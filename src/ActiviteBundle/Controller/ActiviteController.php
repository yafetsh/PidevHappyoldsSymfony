<?php

namespace ActiviteBundle\Controller;

use ActiviteBundle\Entity\Activite;
use ActiviteBundle\Form\ActiviteType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ActiviteController extends Controller
{

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
        $m = new Activite();
        $Form = $this->createForm(ActiviteType::class, $m);
        $Form->handleRequest($request);

        if ($Form->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($m);
            $em->flush();
            return $this->redirectToRoute('affiche_ac');


        }

        return $this->render('ActiviteBundle:activite:ajouteac.html.twig', array('form' => $Form->createView()));
    }

    public function deleteacAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $modele = $em->getRepository("ActiviteBundle:Activite")->find($id);
        $em->remove($modele);
        $em->flush();

        return $this->redirectToRoute('affiche_ac');
    }

}
