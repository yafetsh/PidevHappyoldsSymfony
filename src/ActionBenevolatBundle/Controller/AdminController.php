<?php

namespace ActionBenevolatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{

    public function delete2Action($id)
    {

        $em = $this->getDoctrine()->getManager();
        $actionBenevoles = $em->getRepository("ActionBenevolatBundle:ActionBenevole")->find($id);
        $em->remove($actionBenevoles);
        $em->flush();

        return $this->redirectToRoute('affiche2');
    }

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
    public function rechercheAction( Request $request)
    {

        $sr = $request->get('search');

        $em1 = $this->getDoctrine()->getManager();
        $qb = $em1->createQueryBuilder('e');
        $query = $em1->createQuery('SELECT e  FROM ActionBenevolatBundle:ActionBenevole e WHERE e.dateDAction = :id')
            ->setParameter('id', $sr);

        $users = $query->getResult();





        return $this->render('ActionBenevolatBundle:actionbenevole:rechercheaction.html.twig', array(
            'actionBenevoles' => $users,
        ));

    }
}
