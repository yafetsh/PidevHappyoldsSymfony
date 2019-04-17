<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 09/04/2019
 * Time: 13:46
 */

namespace PrestationsanteBundle\Controller;

use MaisonretraiteBundle\Entity\Resident;
use PrestationsanteBundle\Entity\Allergies;
use PrestationsanteBundle\Entity\DossierMedicale;
use PrestationsanteBundle\Entity\FicheMedicale;
use PrestationsanteBundle\Entity\PrescriptionsMedicaments;
use PrestationsanteBundle\Entity\PrestationSante;
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

    public function afficherListeDossierAdminAction()
    {
        $em=$this->getDoctrine();
        $dossier=$em->getRepository("PrestationsanteBundle:DossierMedicale")->findAll();

return $this->afficherListeResidentAdminAction();
       // return $this->render('@Prestationsante/dossierMedicale/afficherDossierAdmin.html.twig',array('d'=>$dossier));
    }

    public function afficherListeResidentAction()
    {
        $em=$this->getDoctrine();
        $resident=$em->getRepository("MaisonretraiteBundle:Resident")->findAll();
        $dossier=$em->getRepository("PrestationsanteBundle:DossierMedicale")->findAll();
        $prestation=$em->getRepository("PrestationsanteBundle:PrestationSante")->findAll();

        return $this->render('@Prestationsante/dossierMedicale/listeResident.html.twig',array(
            'r'=>$resident,
            'd'=>$dossier,
            'p'=>$prestation));

    }
    public function afficherListeResidentAdminAction(){
        $em=$this->getDoctrine();
        $resident=$em->getRepository("MaisonretraiteBundle:Resident")->findAll();
        $dossier=$em->getRepository("PrestationsanteBundle:DossierMedicale")->findAll();
        $prestation=$em->getRepository("PrestationsanteBundle:PrestationSante")->findAll();


       // return $this->render('@Prestationsante/dossierMedicale/listeResidentAdmin.html.twig',array('r'=>$resident));
        return $this->render('@Prestationsante/dossierMedicale/listeResidentAdmin.html.twig',array(
            'r'=>$resident,
            'd'=>$dossier,
            'p'=>$prestation));
    }
    public function ajouterDossierAction(Request $request,$id)
    {
        $em=$this->getDoctrine();
        $resident=$em->getRepository("MaisonretraiteBundle:Resident")->find($id);
        $dossier = new DossierMedicale();
        $medicament = new PrescriptionsMedicaments();
        $allergie = new Allergies();

        if ($request->isMethod('POST')) {

            if (empty($request->get('nbvisite')) or $request->get('nbvisite')<1) {
                $this->addFlash('forum_ranks_failure', 'nombre de visite mal entré !');
                $err = true;
            }
            else
                if (empty($request->get('problemesante')) ) {
                    $this->addFlash('forum_ranks_failure', 'Problemes de santé ou quelques remarques ne doit pas etre vide !');
                    $err = true;
                }
                else

                    if (empty($request->get('descmedicament')) ) {
                        $this->addFlash('forum_ranks_failure', 'Prescription de santé ne doit pas etre vide !');
                        $err = true;
                    }
                    else {


                        //ajout du dossier
                        // $dossier->setIdDossier((int)$request->get('hidden'));
                        $dossier->setNbVisite($request->get('nbvisite'));
                        $dossier->setProblemesSante($request->get('problemesante'));
                        $dossier->setIdResident($resident);

                        $em = $this->getDoctrine()->getManager();
                        $em->persist($dossier);
                        $em->flush();
                        //   var_dump($dossier);

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


                        $em = $this->getDoctrine()->getManager();
                        // $dossier=$em->getRepository("CRUDBundle:DossierMedicale")->WithResidentId($id);
                        $dossier = $em->getRepository("PrestationsanteBundle:DossierMedicale")->findBy(array('idResident' => $id));
                        $resident = $em->getRepository("MaisonretraiteBundle:Resident")->find($id);
                        $allergie = $em->getRepository("PrestationsanteBundle:Allergies")->findBy(array(
                            'idDossier' => $dossier[0]->getIdDossier()));
                        $prescription = $em->getRepository("PrestationsanteBundle:PrescriptionsMedicaments")->findBy(array(
                            'idDossier' => $dossier[0]->getIdDossier()));

                        return $this->render('@Prestationsante/dossierMedicale/afficherDossier.html.twig', array(
                            'dossier' => $dossier,
                            'resident' => $resident,
                            'allergies' => $allergie,
                            'prescriptions' => $prescription));
                        //  var_dump($dossier->getIdDossier());


                    }

        }

        return $this->render('@Prestationsante/dossierMedicale/ajouterDossier.html.twig',array('resident'=>$resident));
    }



    public  function supprimerDossierAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $dossier = $em->getRepository("PrestationsanteBundle:DossierMedicale")->find($id);
        $em->remove($dossier);
        $em->flush();

        return $this->redirectToRoute('afficher_liste_dossier_pour_admin');
    }

    public function modifierDossierAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $idDossier=(int) $request->get('iddossierhidden');
        $dossier = $em->getRepository("PrestationsanteBundle:DossierMedicale")->find($idDossier);

//var_dump($idDossier);
        if ($request->isMethod('POST')) {

          //  $dossier->setNbVisite($request->get('nbvisite'));
            $dossier->setProblemesSante($request->get('problemesante'));


            $em = $this->getDoctrine()->getManager();
            $em->persist($dossier);
            $em->flush();

          //  return $this->redirectToRoute('afficher_liste_resident');

        }
      //  return $this->redirectToRoute('afficher_liste_resident');
        //return $this->render('@Prestationsante/dossierMedicale/modifierDossier.html.twig',array('d'=>$dossier));
    }





    public  function supprimerAllergieAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $allergie = $em->getRepository("PrestationsanteBundle:Allergies")->find($id);
        $em->remove($allergie);
        $em->flush();

        return $this->redirectToRoute('afficher_liste_resident');
    }

    public function ajouterAllergieAction(Request $request)
    {
        $em=$this->getDoctrine();

        $idDossier=(int) $request->get('iddossierhidden');
        $dossier=$em->getRepository("PrestationsanteBundle:DossierMedicale")->find($idDossier);

        $allergie= new Allergies();

        if ($request->isMethod('POST')) {

            $allergie->setDescriptionAllergie($request->get('descAllergie'));
            $allergie->setAntecedants($request->get('antecedants'));
            $allergie->setDateAllergies(new \DateTime());
            $allergie->setIdDossier($dossier);


            $em = $this->getDoctrine()->getManager();
            $em->persist($allergie);
            $em->flush();
        }

        return $this->redirectToRoute('afficher_liste_resident');
    }

    public function ajouterPrescriptionAction(Request $request)
    {
        $em=$this->getDoctrine();

        $idDossier=(int) $request->get('iddossierhidden');
        $dossier=$em->getRepository("PrestationsanteBundle:DossierMedicale")->find($idDossier);

        $prescription = new PrescriptionsMedicaments();

        if ($request->isMethod('POST')) {

            $prescription->setIdDossier($dossier);
            $prescription->setDescriptionMedicament($request->get('medicaments'));
            $prescription->setDateDebutTraitement(new \DateTime());


            $em = $this->getDoctrine()->getManager();
            $em->persist($prescription);
            $em->flush();
        }

        return $this->redirectToRoute('afficher_liste_resident');
    }

    public  function supprimerPrescriptionAction(Request $request,$id)
    {
        $id2= $request->get('idAllergie');

        $em = $this->getDoctrine()->getManager();
        $prescription = $em->getRepository("PrestationsanteBundle:PrescriptionsMedicaments")->find($id2);
        $em->remove($prescription);
        $em->flush();



        var_dump($id);
        return $this->redirectToRoute('afficher_liste_resident');
    }


    public function getDossierByResidentAction(Request $request ,$id){
        $em=$this->getDoctrine()->getManager();
        // $dossier=$em->getRepository("CRUDBundle:DossierMedicale")->WithResidentId($id);
        $dossier=$em->getRepository("PrestationsanteBundle:DossierMedicale")->findBy(array('idResident'=>$id));
        $resident=$em->getRepository("MaisonretraiteBundle:Resident")->find($id);
        $allergie=$em->getRepository("PrestationsanteBundle:Allergies")->findBy(array(
            'idDossier'=>$dossier[0]->getIdDossier()));
        $prescription=$em->getRepository("PrestationsanteBundle:PrescriptionsMedicaments")->findBy(array(
            'idDossier'=>$dossier[0]->getIdDossier()));


        //var_dump($resident->getIdResident());

        if($request->isMethod('post') and $request->request->has('modifierDossier'))
        {
            $this->modifierDossierAction($request);
        }
        if($request->isMethod('post') and $request->request->has('ajouterAllergie'))
        {
            $this->ajouterAllergieAction($request);

            $em=$this->getDoctrine()->getManager();
            $dossier=$em->getRepository("PrestationsanteBundle:DossierMedicale")->findBy(array('idResident'=>$id));
            $resident=$em->getRepository("MaisonretraiteBundle:Resident")->find($id);
            $allergie=$em->getRepository("PrestationsanteBundle:Allergies")->findBy(array(
                'idDossier'=>$dossier[0]->getIdDossier()));
            $prescription=$em->getRepository("PrestationsanteBundle:PrescriptionsMedicaments")->findBy(array(
                'idDossier'=>$dossier[0]->getIdDossier()));
        }
        if($request->isMethod('post') and $request->request->has('ajouterPrescription'))
        {
            $this->ajouterPrescriptionAction($request);

            $em=$this->getDoctrine()->getManager();
            $dossier=$em->getRepository("PrestationsanteBundle:DossierMedicale")->findBy(array('idResident'=>$id));
            $resident=$em->getRepository("MaisonretraiteBundle:Resident")->find($id);
            $allergie=$em->getRepository("PrestationsanteBundle:Allergies")->findBy(array(
                'idDossier'=>$dossier[0]->getIdDossier()));
            $prescription=$em->getRepository("PrestationsanteBundle:PrescriptionsMedicaments")->findBy(array(
                'idDossier'=>$dossier[0]->getIdDossier()));
        }
        return $this->render('@Prestationsante/dossierMedicale/afficherDossier.html.twig',array(
            'dossier'=>$dossier,
            'resident'=>$resident,
            'allergies'=>$allergie,
            'prescriptions'=>$prescription));
    }

    public function getDossierByResidentAdminAction($id){
        $em=$this->getDoctrine()->getManager();
        // $dossier=$em->getRepository("CRUDBundle:DossierMedicale")->WithResidentId($id);
        $dossier=$em->getRepository("PrestationsanteBundle:DossierMedicale")->findBy(array('idResident'=>$id));
        $resident=$em->getRepository("MaisonretraiteBundle:Resident")->find($id);
        $allergie=$em->getRepository("PrestationsanteBundle:Allergies")->findBy(array(
            'idDossier'=>$dossier[0]->getIdDossier()));
        $prescription=$em->getRepository("PrestationsanteBundle:PrescriptionsMedicaments")->findBy(array(
            'idDossier'=>$dossier[0]->getIdDossier()));


        return $this->render('@Prestationsante/dossierMedicale/afficherDossierAdmin.html.twig',array(
            'dossier'=>$dossier,
            'resident'=>$resident,
            'allergies'=>$allergie,
            'prescriptions'=>$prescription));
    }
}