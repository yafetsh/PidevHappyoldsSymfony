<?php

namespace ActiviteBundle\Controller;

use ActiviteBundle\Entity\CategorieActivite;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;



class CategorieController extends Controller
{

    public function ajoutecAction(Request $request)

    {
        $categorie = new CategorieActivite();
        if ($request->isMethod('POST')) {
            $categorie->setType($request->get('type'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();
            return $this->redirectToRoute('affiche_c');


        }

        return $this->render('ActiviteBundle:activite:ajoutec.html.twig', array());
    }


    public function affichecAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('ActiviteBundle:CategorieActivite')->findAll();

        return $this->render('ActiviteBundle:activite:affichec.html.twig', array(
            'categories' => $categories,
        ));
    }

    public function deletecAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $categorie = $em->getRepository("ActiviteBundle:CategorieActivite")->find($id);
        $em->remove($categorie);
        $em->flush();

        return $this->redirectToRoute('affiche_c');
    }


}
