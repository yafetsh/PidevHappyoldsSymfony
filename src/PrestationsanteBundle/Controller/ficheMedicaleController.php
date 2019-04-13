<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 09/04/2019
 * Time: 13:46
 */

namespace PrestationsanteBundle\Controller;


use PrestationsanteBundle\Entity\FicheMedicale;
use PrestationsanteBundle\Form\FicheMedicaleType;
use \Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ficheMedicaleController extends Controller
{
    public function afficherFicheAction()
    {
        $em=$this->getDoctrine();
        $fiche=$em->getRepository("PrestationsanteBundle:FicheMedicale")->findAll();
        return $this->render('@Prestationsante/ficheMedicale/afficherFiche.html.twig',array('f'=>$fiche));
    }
    public function ajouterFicheAction(Request $request)
    {
        $fiche = new FicheMedicale();

        if ($request->isMethod('POST')) {

           $fiche->setDateCreationFiche(new \DateTime());
            $fiche->setDateDermodifFiche(new \DateTime());

            $fiche->setGroupeSanguin($request->get('groupe_sanguin'));
            $fiche->setMedicaments($request->get('medicaments'));
            $fiche->setNiveauSec($request->get('niveau_sec'));
            $fiche->setNiveauTemp($request->get('niveau_temp'));
            $fiche->setNiveauTension($request->get('niveau_tension'));
            $fiche->setPoidsResident($request->get('poids_resident'));
            $fiche->setRemarquesFiche($request->get('remarques_fiche'));
            $fiche->setTailleResident($request->get('taille_resident'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($fiche);
            $em->flush();

        }

        return $this->render('@Prestationsante/ficheMedicale/ajouterDossier.html.twig');
    }



    public  function supprimerFicheAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $fiche = $em->getRepository("PrestationsanteBundle:FicheMedicale")->find($id);
        $em->remove($fiche);
        $em->flush();

        return $this->redirectToRoute('afficher_fiche');
    }

    public function modifierFicheAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $fiche = $em->getRepository("PrestationsanteBundle:FicheMedicale")->find($id);
        $Form = $this->createForm(FicheMedicaleType::class, $fiche);
        $Form->handleRequest($request);
        if ($Form->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($fiche);
            $em->flush();
            return $this->redirectToRoute('afficher_fiche');

        }

        return $this->render('@Prestationsante/FicheMedicale/modifierDossier.html.twig', array('form' => $Form->createView()));
    }
}