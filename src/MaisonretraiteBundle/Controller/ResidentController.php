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

        $residents = $em->getRepository('MaisonretraiteBundle:Resident')->findBy(
            ['etat' => 'valide']

        );
        return $this->render('MaisonretraiteBundle:resident:affichere.html.twig', array(
            'residents' => $residents,
        ));
    }
    public function affichereAAction()
    {
        $em = $this->getDoctrine()->getManager();

        $residents = $em->getRepository('MaisonretraiteBundle:Resident')->findBy(
            ['etat' => 'invalide']

        );

        return $this->render('MaisonretraiteBundle:resident:affichereA.html.twig', array(
            'residents' => $residents,
        ));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function ajoutreAction(Request $request)

    {
        $m = new Maison();
        $r = new Resident();
        $Form = $this->createForm(ResidentType::class, $r);
        $Form->handleRequest($request);
//        $nomMaison =  $request->query->get('nom_maison');
//        $idMaison =  $request->query->get('id_maison');
//        $maison = $this->getDoctrine()->getRepository(Maison::class)->findBy(['nomMaison' => $nomMaison]);
//        $idMaison = $maison->getId();
//        var_dump ($nomMaison);
//        $infoArray['idMaison'] = $maison->getCountry() ? $maison->getCountry()->getId() ;
//        var_dump($Form->getData());

        if ($Form->isSubmitted()) {
            $resident = $Form->getData();
            $resident->setEtat("invalide");

//            $maison = $this->getDoctrine()->getRepository(Maison::class)->find($nomMaison);
//            $maison = $this->getDoctrine()->getRepository(Maison::class)->findByNomMaison($nomMaison);
//            $maison = $this->getDoctrine()->getRepository(Maison::class)->findOneBy(['nom_maison' => $nomMaison]);

            $em = $this->getDoctrine()->getManager();
//          foreach ($maison as $i){
//            $em1 = $this->getDoctrine()->getManager();
//            $qb = $em1->createQueryBuilder();
//            $qb ->update('MaisonretraiteBundle:Maison', 'm')
//                ->set('m.nbrPersonne',$maison->getNbrPersonne()-1)
//            ->where('m.idMaison  = :idMaison')
//                ->setParameter('idMaison', $idMaison)
//                ->getQuery()
//                ->execute();
//             $m->setNbrPersonne($m->getNbrPersonne()-1);
//              $em->persist($m);
//              $em->flush();
//          }

            $em->persist($resident);
            $em->flush();

//            $notification = new Notification();
//            $notification
//                ->setTitle('Un nouveau résident est inscrit')
//                ->setDescription($r->getPrenomResident())
//                ->setRoute('affiche_re')// I suppose you have a show route for your entity
//                ->setParameters(array('id' => $r->getIdResident()))
//            ;
//            $em->persist($notification);
//            $em->flush();
//            $pusher = $this->get('mrad.pusher.notificaitons');
//            $pusher->trigger($notification);
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

    public function confirmerAction( $id,Request $request)

    {
        $nomMaison =  $request->query->get('nom_maison');

        $em = $this->getDoctrine()->getManager();
        $modele = $em->getRepository("MaisonretraiteBundle:Maison")->find($id);
//        $maison = $this->getDoctrine()->getRepository(Resident::class)->findBy(['idMaison' => $nomMaison]);
        $nomMaison =  $request->query->get('id_maison');

        $maison = $this->getDoctrine()->getRepository(Maison::class)->findOneBy(['idMaison' => $modele]);
//        $idMaison = $maison->getMaison()->getNomMaison();
//        $em1 = $this->getDoctrine()->getManager();
//        $qb = $em1->createQueryBuilder('e');
//        $query = $em1->createQuery('SELECT e  FROM MaisonretraiteBundle:Resident e WHERE e.idResident = :id')
//            ->setParameter('id',$id );
//        $users = $query->getResult();

//        $query = $em->createQuery("SELECT nbr_personne From MaisonretraiteBundle:Maison ");
//        $rs = $query->getResult();
//        return $this->redirectToRoute('affiche2');
//        return $this->render('ActionBenevolatBundle:actionbenevole:showAdmin.html.twig');
//            $em1 = $this->getDoctrine()->getManager();
//            $qb = $em1->createQueryBuilder();
//            $qb ->update('MaisonretraiteBundle:Maison', 'm')
//                ->set('m.nbrPersonne',$maison->getNbrPersonne()-1)
//            ->where('m.idMaison  = :idMaison')
//                ->setParameter('idMaison', $idMaison)
//                ->getQuery()
//                ->execute();
//            $maison->setNbrPersonne($maison->getNbrPersonne()-1);
//            $em->persist($m);
//            $em->flush();
            var_dump($nomMaison);





//        return $this->redirectToRoute('confirmer');
        return $this->render('MaisonretraiteBundle:resident:confirmer.html.twig');

    }
    public function exportAction(){
        $em = $this->getDoctrine()->getManager();
        $maisons = $em->getRepository("MaisonretraiteBundle:Resident")->findAll();

        $writer = $this->container->get('egyg33k.csv.writer');
        $csv = $writer::createFromFileObject(new \SplTempFileObject());
        $csv->insertOne(['Nom ', 'Prenom','Age','Sexe','Responsable','Telephone responsable','Maison']);
        foreach ($maisons as $maison){
            $csv->insertOne([$maison->getNomResident(), $maison->getPrenomResident(), $maison->getAgeResident(),$maison->getSexeResident(), $maison->getResponsable(), $maison->getTelephoneResponsable(),$maison->getMaison()->getNomMaison()]);

        }
        $csv->output('ListeResidents.csv');
        exit;
    }
    public function validerAction($id,$idMaison)
    {
        $em1 = $this->getDoctrine()->getManager();
        $qb = $em1->createQueryBuilder();
        $qb ->update('MaisonretraiteBundle:Resident', 'e')
            ->set('e.etat',"'valide'")
            ->where('e.idResident  = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->execute();;
        $maisons = $em1->getRepository("MaisonretraiteBundle:Maison")->find($idMaison);
        $maisons->setNbrPersonne($maisons->getNbrPersonne()-1);
        $em1->persist($maisons);
            $em1->flush();

        return $this->redirectToRoute('affiche_reA');
    }
}
