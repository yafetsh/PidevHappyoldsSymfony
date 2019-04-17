<?php

namespace MaisonretraiteBundle\Controller;
use MaisonretraiteBundle\Entity\Notification;
use MaisonretraiteBundle\Form\MaisonType;
use MaisonretraiteBundle\Entity\Maison;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class MaisonController extends Controller
{
    public function affichemaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $listmaisons = $em->getRepository('MaisonretraiteBundle:Maison')->findAll();

        /**
         * @var $paginator \Knp\Component\Pager\Paginator
         */
        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $listmaisons,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 5)
        );

//qfsdff

        return $this->render('MaisonretraiteBundle:maison:affichema.html.twig', array(
            'maisons' => $result,
        ));
    }

    public function ajoutemaAction(Request $request)

    {
        $m = new Maison();
        $Form = $this->createForm(MaisonType::class, $m);
        $Form->handleRequest($request);

        if ($Form->isSubmitted() && $Form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($m);
            $em->flush();

//            $notification = new Notification();
//            $notification
//                ->setTitle('New Maison')
//                ->setDescription($m->getNomMaison())
//                ->setRoute('affiche_ma')// I suppose you have a show route for your entity
//                ->setParameters(array('id' => $m->getIdMaison()))
//            ;
//            $em->persist($notification);
//            $em->flush();
//            $pusher = $this->get('mrad.pusher.notificaitons');
//            $pusher->trigger($notification);


            return $this->redirectToRoute('affiche_ma');


        }

        return $this->render('MaisonretraiteBundle:maison:ajoutema.html.twig', array('form' => $Form->createView()));
    }

    public function deletemaAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $modele = $em->getRepository("MaisonretraiteBundle:Maison")->find($id);
        $em->remove($modele);
        $em->flush();

        return $this->redirectToRoute('affiche_ma');
    }

    public function editmaAction(Request $request, $id)

    {
        $em = $this->getDoctrine()->getManager();
        $maison = $em->getRepository("MaisonretraiteBundle:Maison")->find($id);
        $Form = $this->createForm(MaisonType::class, $maison);
        $Form->handleRequest($request);
        if ($Form->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('affiche_ma');

        }

        return $this->render('MaisonretraiteBundle:maison:editma.html.twig', array('form' => $Form->createView()));
    }

    public function ajaxAction(Request $request)
    {
        $maisons = $this->getDoctrine()
            ->getRepository('MaisonretraiteBundle:Maison')
            ->findAll();

        if ($request->isXmlHttpRequest() || $request->query->get('showJson') == 1) {
            $jsonData = array();
            $idx = 0;
            foreach ($maisons as $maison) {
                $temp = array(
                    'nom_maison' => $maison->getNomMaison(),
                    'adresse_maison' => $maison->getAdresseMaison(),
                );
                $jsonData[$idx++] = $temp;
            }
            return new JsonResponse($jsonData);
        } else {
            return $this->render('MaisonretraiteBundle:maison:affichema.html.twig');
        }
    }

    public function rechercheAction(Request $request)

    {


        $sr = $request->get('search');

        $em1 = $this->getDoctrine()->getManager();
        $qb = $em1->createQueryBuilder('e');
        $query = $em1->createQuery('SELECT e  FROM MaisonretraiteBundle:Maison e WHERE e.nomMaison = :id')
            ->setParameter('id', $sr);


        $users = $query->getResult();





        return $this->render('MaisonretraiteBundle:maison:rechercheaction.html.twig', array(
            'maisons' => $users,
        ));
    }
}
