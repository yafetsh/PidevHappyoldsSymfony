<?php

namespace MaisonretraiteBundle\Controller;

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
        $m = new Resident();
        $Form = $this->createForm(ResidentType::class, $m);
        $Form->handleRequest($request);
        $nomMaison = $request->request->get('nom_maison');

        if ($Form->isSubmitted()) {
//            $maison = $this->getDoctrine()->getRepository(Maison::class)->find($nomMaison);

            $em = $this->getDoctrine()->getManager();
//          foreach ($maison as $i){

//              $maison->setNbrPersonne($maison->getNbrPersonne()-1);
//              $em->persist($maison);
//              $em->flush();
//          }

            $em->persist($m);
            $em->flush();
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
    public function JsonDemandesAction(){
        $em=$this->getDoctrine()->getManager();
        $encoders = array(new JsonEncoder());
        $normalizers = array(new GetSetMethodNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        $product=$em->getRepository(Resident::class)->findbestdd();

        $response = new Response($serializer->serialize($product, 'json'));
        $response->headers->set('Content-Type', 'application/json');
        return $response;

    }

    public function calendarAction(){



        return $this->render('@Maisonretraite/resident/calendar.html.twig');


    }
}
