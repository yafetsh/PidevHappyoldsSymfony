<?php

namespace ActionBenevolatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function validerAction($id)
    {
        $em1 = $this->getDoctrine()->getManager();
        $qb = $em1->createQueryBuilder();
        $qb ->update('ActionBenevolatBundle:ActionBenevole', 'e')
            ->set('e.etat',"'valide'")
            ->where('e.idAction  = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->execute();;


        return $this->redirectToRoute('affiche2');
        return $this->render('ActionBenevolatBundle:actionbenevole:showAdmin.html.twig');
    }
}
