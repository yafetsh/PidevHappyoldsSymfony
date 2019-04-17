<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 09/04/2019
 * Time: 13:46
 */

namespace PrestationsanteBundle\Controller;

use MaisonretraiteBundle\Entity\Resident;

use PrestationsanteBundle\Entity\FicheMedicale;
use PrestationsanteBundle\Entity\PrestationSante;
use UserBundle\Entity\User;
use PrestationsanteBundle\Form\FicheMedicaleType;
use PrestationsanteBundle\PrestationsanteBundle;
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

    public function afficherFicheParResidentAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $fiches=$em->getRepository("PrestationsanteBundle:PrestationSante")->findBy(array('idResident'=>$id));
        $resident=$em->getRepository("MaisonretraiteBundle:Resident")->find($id);

        //var_dump($fiches);

   $tabIdFiche = array();
   $tabFiche = array();
   foreach ($fiches as $idf){
        $tabIdFiche[]=$idf->getIdFiche()->getIdFiche();
   }
   //var_dump($tabIdFiche);
        foreach ($tabIdFiche as $f){
            $tabFiche[]=$em->getRepository("PrestationsanteBundle:FicheMedicale")->find($f);
        }
    //var_dump($tabFiche[0]->getIdFiche());

        return $this->render('@Prestationsante/ficheMedicale/afficherFiche.html.twig',array('f'=>$tabFiche,
            'resident'=>$resident));
    }

    public function afficherFicheParResidentAdminAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $fiches=$em->getRepository("PrestationsanteBundle:PrestationSante")->findBy(array('idResident'=>$id));
        $resident=$em->getRepository("MaisonretraiteBundle:Resident")->find($id);

        //var_dump($fiches);

        $tabIdFiche = array();
        $tabFiche = array();
        foreach ($fiches as $idf){
            $tabIdFiche[]=$idf->getIdFiche()->getIdFiche();
        }
     //   var_dump($tabIdFiche);
        foreach ($tabIdFiche as $f){
            $tabFiche[]=$em->getRepository("PrestationsanteBundle:FicheMedicale")->find($f);
        }
      //  var_dump($tabFiche[0]->getIdFiche());

        return $this->render('@Prestationsante/ficheMedicale/afficherFicheAdmin.html.twig',array('f'=>$tabFiche,
            'resident'=>$resident));
    }

    public function ajouterFicheAction(Request $request,$idResident)
    {
        $em=$this->getDoctrine()->getManager();
        $resident=$em->getRepository("MaisonretraiteBundle:Resident")->find($idResident);
        $fiche = new FicheMedicale();

        if ($request->isMethod('POST')) {
           // var_dump($request->get('niveau_temperature'));
            $err = false;
            if (empty($request->get('remarques_fiche'))) {
                $this->addFlash('forum_ranks_failure', 'Il faut ajouter au moin une remarque !');
                $err = true;
            }else {


                $fiche->setDateCreationFiche(new \DateTime());
                $fiche->setDateDermodifFiche(new \DateTime());

                $fiche->setGroupeSanguin($request->get('groupe_sanguin'));
                $fiche->setMedicaments($request->get('medicaments'));
                $fiche->setNiveauSec($request->get('niveau_sucre'));
                $fiche->setNiveauTemp($request->get('niveau_temperature'));
                $fiche->setNiveauTension($request->get('niveau_tension'));
                $fiche->setPoidsResident($request->get('poids_resident'));
                $fiche->setRemarquesFiche($request->get('remarques_fiche'));
                $fiche->setTailleResident($request->get('taille_resident'));

                $em = $this->getDoctrine()->getManager();
                $em->persist($fiche);
                $em->flush();
                $fiche->getIdFiche();

                //ajout dans la table prestation :

                $prestation = new PrestationSante();
                $prestation->setIdResident($resident);
                $prestation->setMedicaments($fiche->getMedicaments());
                $prestation->setDate(new \DateTime());
                $prestation->setIdFiche($fiche);
                // $prestation->setIdUser($user);
                $prestation->setNomResident("nomresident");
                $prestation->setPrenomResident("prenomresident");
                $prestation->setPrenomUser("prenomuser");
                $prestation->setNomUser("nomuser");

                $em = $this->getDoctrine()->getManager();
                $em->persist($prestation);
                $em->flush();


                // afficher la fiche ajoutée:
                $em = $this->getDoctrine()->getManager();
                $fiches = $em->getRepository("PrestationsanteBundle:PrestationSante")->findBy(array('idResident' => $idResident));
                $resident = $em->getRepository("MaisonretraiteBundle:Resident")->find($idResident);

                $tabIdFiche = array();
                $tabFiche = array();
                foreach ($fiches as $idf) {
                    $tabIdFiche[] = $idf->getIdFiche()->getIdFiche();
                }
                foreach ($tabIdFiche as $f) {
                    $tabFiche[] = $em->getRepository("PrestationsanteBundle:FicheMedicale")->find($f);
                }

                return $this->render('@Prestationsante/ficheMedicale/afficherFiche.html.twig', array('f' => $tabFiche,
                    'resident' => $resident));
            }


        }

        return $this->render('@Prestationsante/ficheMedicale/ajouterFiche.html.twig',array('resident'=>$resident));


    }



    public  function supprimerFicheAction($id,$idResident)
    {
        $em = $this->getDoctrine()->getManager();
        $fiche = $em->getRepository("PrestationsanteBundle:FicheMedicale")->find($id);
        $em->remove($fiche);
        $em->flush();

      //  return $this->redirectToRoute('afficher_fiche');
        return $this->afficherFicheParResidentAdminAction($idResident);
    }

    public function modifierFicheAction(Request $request,$idFiche,$idResident)
    {
        $em = $this->getDoctrine()->getManager();
        $fiche = $em->getRepository("PrestationsanteBundle:FicheMedicale")->find($idFiche);
        $resident=$em->getRepository("MaisonretraiteBundle:Resident")->find($idResident);
      //  $fiche = new FicheMedicale();

        if ($request->isMethod('POST')) {


                // var_dump($request->get('niveau_temperature'));
                $err = false;
                if (empty($request->get('remarques_fiche'))) {
                    $this->addFlash('forum_ranks_failure', 'Il faut ajouter au moin une remarque !');
                    $err = true;
                }else {

                    // $fiche->setDateCreationFiche(new \DateTime());
                    $fiche->setDateDermodifFiche(new \DateTime());

                    //  $fiche->setGroupeSanguin($request->get('groupe_sanguin'));
                    $fiche->setMedicaments($request->get('medicaments'));
                    $fiche->setNiveauSec($request->get('niveau_sucre'));
                    $fiche->setNiveauTemp($request->get('niveau_temperature'));
                    $fiche->setNiveauTension($request->get('niveau_tension'));
                    $fiche->setPoidsResident($request->get('poids_resident'));
                    $fiche->setRemarquesFiche($request->get('remarques_fiche'));
                    //  $fiche->setTailleResident($request->get('taille_resident'));

                    $em = $this->getDoctrine()->getManager();
                    $em->persist($fiche);
                    $em->flush();
                    $fiche->getIdFiche();


                    // afficher la fiche ajoutée:
                    $em = $this->getDoctrine()->getManager();
                    $fiches = $em->getRepository("PrestationsanteBundle:PrestationSante")->findBy(array('idResident' => $idResident));
                    $resident = $em->getRepository("MaisonretraiteBundle:Resident")->find($idResident);

                    $tabIdFiche = array();
                    $tabFiche = array();
                    foreach ($fiches as $idf) {
                        $tabIdFiche[] = $idf->getIdFiche()->getIdFiche();
                    }
                    foreach ($tabIdFiche as $f) {
                        $tabFiche[] = $em->getRepository("PrestationsanteBundle:FicheMedicale")->find($f);
                    }
                    $this->addFlash('success', 'Fiche modifieée avec succé !');

                    return $this->render('@Prestationsante/ficheMedicale/afficherFiche.html.twig', array('f' => $tabFiche,
                        'resident' => $resident));
                }
        }

      /*  $Form = $this->createForm(FicheMedicaleType::class, $fiche);
        $Form->handleRequest($request);
        if ($Form->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($fiche);
            $em->flush();
            return $this->redirectToRoute('idFiche');

        }*/

        return $this->render('@Prestationsante/FicheMedicale/modifierFiche.html.twig', array(
            'fiche' => $fiche,
            'resident' =>$resident));
    }
}