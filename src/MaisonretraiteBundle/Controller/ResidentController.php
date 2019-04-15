<?php

namespace MaisonretraiteBundle\Controller;
use MaisonretraiteBundle\Entity\Notification;

use MaisonretraiteBundle\Entity\Maison;
use MaisonretraiteBundle\Entity\Resident;
use MaisonretraiteBundle\Form\ResidentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;


class ResidentController extends Controller
{
    public function affichereAction()
    {
        $em = $this->getDoctrine()->getManager();

        $residents = $em->getRepository('MaisonretraiteBundle:Resident')->findAll();

        return $this->render('MaisonretraiteBundle:resident:affichere.html.twig', array(
            'residents' => $residents,
        ));
    }

    public function ajoutreAction(Request $request)

    {
        $r = new Resident();
        $Form = $this->createForm(ResidentType::class, $r);
        $Form->handleRequest($request);
//        $nomMaison = $request->get('nom_maison');

        if ($Form->isSubmitted()) {
//            $maison = $this->getDoctrine()->getRepository(Maison::class)->find($nomMaison);

            $em = $this->getDoctrine()->getManager();
//          foreach ($maison as $i){

//              $maison->setNbrPersonne($maison->getNbrPersonne()-1);
//              $em->persist($maison);
//              $em->flush();
//          }

            $em->persist($r);
            $em->flush();

            $notification = new Notification();
            $notification
                ->setTitle('Un nouveau résident est inscrit')
                ->setDescription($r->getPrenomResident())
                ->setRoute('affiche_re')// I suppose you have a show route for your entity
                ->setParameters(array('id' => $r->getIdResident()))
            ;
            $em->persist($notification);
            $em->flush();
            $pusher = $this->get('mrad.pusher.notificaitons');
            $pusher->trigger($notification);
            return $this->redirectToRoute('affiche_re');


        }

        return $this->render('MaisonretraiteBundle:resident:ajoutre.html.twig', array('form' => $Form->createView()));
    }

    public function deletereAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $modele = $em->getRepository("MaisonretraiteBundle:Resident")->find($id);
        $em->remove($modele);
        $em->flush();

        return $this->redirectToRoute('affiche_re');
    }
    public function editreAction(Request $request, $id)

    {
        $em = $this->getDoctrine()->getManager();
        $resident = $em->getRepository("MaisonretraiteBundle:Resident")->find($id);
        $Form = $this->createForm(ResidentType::class, $resident);
        $Form->handleRequest($request);
        if ($Form->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('affiche_re');

        }

        return $this->render('MaisonretraiteBundle:resident:editre.html.twig', array('edit_form' => $Form->createView()));
    }

}
