<?php

namespace ActiviteBundle\Controller;

use ActiviteBundle\Entity\CategorieActivite;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ActiviteBundle\Form\CategorieActiviteType;


class CategorieActiviteController extends Controller
{

    public function ajouteacAction(Request $request)

    {
        $m = new CategorieActivite();
        $Form = $this->createForm(CategorieActiviteType::class, $m);
        $Form->handleRequest($request);

        if ($Form->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($m);
            $em->flush();
            return $this->redirectToRoute('affiche_ac');


        }

        return $this->render('ActiviteBundle:activite:ajouteac.html.twig', array('form' => $Form->createView()));
    }


}
