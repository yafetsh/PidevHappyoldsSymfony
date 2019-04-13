<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 09/04/2019
 * Time: 13:46
 */

namespace PrestationsanteBundle\Controller;


use PrestationsanteBundle\Entity\Allergies;
use PrestationsanteBundle\Entity\DossierMedicale;
use PrestationsanteBundle\Entity\FicheMedicale;
use PrestationsanteBundle\Entity\PrescriptionsMedicaments;
use PrestationsanteBundle\Form\FicheMedicaleType;
use \Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DossierController extends Controller
{
    public function afficherListeDossierAction()
    {
        $em=$this->getDoctrine();
        $dossier=$em->getRepository("PrestationsanteBundle:DossierMedicale")->findAll();
        return $this->render('@Prestationsante/dossierMedicale/afficherDossier.html.twig',array('d'=>$dossier));
    }

    public function afficherListeResidentAction()
    {
        $em=$this->getDoctrine();
        $resident=$em->getRepository("PrestationsanteBundle:Resident")->findAll();
        return $this->render('@Prestationsante/dossierMedicale/listeResident.html.twig',array('r'=>$resident));
    }
    public function afficherListeResidentAdminAction(){
        $em=$this->getDoctrine();
        $resident=$em->getRepository("PrestationsanteBundle:Resident")->findAll();
        return $this->render('@Prestationsante/Default/indexspo.html.twig',array('r'=>$resident));
    }
    public function ajouterDossierAction(Request $request,$id)
    {$em=$this->getDoctrine();
        $resident=$em->getRepository("PrestationsanteBundle:Resident")->find($id);
        $dossier = new DossierMedicale();
        $medicament = new PrescriptionsMedicaments();
        $allergie = new Allergies();

        if ($request->isMethod('POST')) {

            //ajout du dossier
           // $dossier->setIdDossier((int)$request->get('hidden'));
            $dossier->setNbVisite($request->get('nbvisite'));
            $dossier->setProblemesSante($request->get('problemesante'));
            $dossier->setIdResident($resident);

            $em = $this->getDoctrine()->getManager();
            $em->persist($dossier);
            $em->flush();
            //ajout du medicament
            $medicament->setIdDossier($dossier);
            $medicament->setDateDebutTraitement(new \DateTime());
            $medicament->setDescriptionMedicament($request->get('descmedicament'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($medicament);
            $em->flush();
            //ajout de l'allergie
            $allergie->setIdDossier($dossier);
            $allergie->setAntecedants($request->get('antecedent'));
            $allergie->setDateAllergies(new \DateTime());
            $allergie->setDescriptionAllergie($request->get('descallergie'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($allergie);
            $em->flush();

          //  var_dump($dossier->getIdDossier());

        }
      /*  else{
            //ajouter un dossier vide au debut
            $dossier->setIdResident($resident);
            $em = $this->getDoctrine()->getManager();
            $em->persist($dossier);
            $em->flush();
          //  var_dump($dossier->getIdDossier());
        }
        var_dump($dossier->getIdDossier());*/
        return $this->render('@Prestationsante/dossierMedicale/ajouterDossier.html.twig');
    }



    public  function supprimerDossierAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $dossier = $em->getRepository("PrestationsanteBundle:DossierMedicale")->find($id);
        $em->remove($dossier);
        $em->flush();

        return $this->redirectToRoute('afficher_liste_resident');
    }

    public function modifierDossierAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $dossier = $em->getRepository("PrestationsanteBundle:DossierMedicale")->find($id);


        if ($request->isMethod('POST')) {

            $dossier->setNbVisite($request->get('nbvisite'));
            $dossier->setProblemesSante($request->get('problemesante'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($dossier);
            $em->flush();

            return $this->redirectToRoute('afficher_liste_resident');

        }

        return $this->render('@Prestationsante/dossierMedicale/modifierDossier.html.twig',array('d'=>$dossier));
    }
    public function getDossierByResidentAction($id){
        $em=$this->getDoctrine()->getManager();
       // $dossier=$em->getRepository("CRUDBundle:DossierMedicale")->WithResidentId($id);
        $dossier=$em->getRepository("PrestationsanteBundle:DossierMedicale")->findBy(array('idResident'=>$id));

        return $this->render('@Prestationsante/dossierMedicale/afficherDossier.html.twig',array('d'=>$dossier));
    }
}