<?php

namespace MaisonretraiteBundle\Controller;
use MaisonretraiteBundle\Entity\Notification;
use MaisonretraiteBundle\Form\MaisonType;
use MaisonretraiteBundle\Entity\Maison;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class MaisonController extends Controller
{
    public function affichemaAction()
    {
        $em = $this->getDoctrine()->getManager();

        $maisons = $em->getRepository('MaisonretraiteBundle:Maison')->findAll();

        return $this->render('MaisonretraiteBundle:maison:affichema.html.twig', array(
            'maisons' => $maisons,
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
}
