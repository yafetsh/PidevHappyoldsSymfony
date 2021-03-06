<?php

namespace MaisonretraiteBundle\Controller;
use MaisonretraiteBundle\Entity\Notification;

use MaisonretraiteBundle\Entity\Maison;
use MaisonretraiteBundle\Entity\Resident;
use MaisonretraiteBundle\Form\ResidentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class ResidentController extends Controller
{
//    public function findEtatUserAction($idUser)
//    {
//        $em = $this->getDoctrine()->getManager();
//        $residents = $em->getRepository('MaisonretraiteBundle:Resident')->findEtatUser($idUser);
////        $residents = $em->getRepository('MaisonretraiteBundle:Resident')->findBy(
////            ['etat' => 'valide']);
//
//        return $this->render('MaisonretraiteBundle:resident:affichere.html.twig', array(
//            'residents' => $residents,
//        ));
//    }

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
//        $r->setIdUser($this->getUser());
        $r->setIdUser($this->getUser());

        if ($Form->isSubmitted()) {
            $resident = $Form->getData();
            $resident->setEtat("invalide");
            $em = $this->getDoctrine()->getManager();
            $em->persist($resident);
            $em->flush();

            return $this->redirectToRoute('affiche_re');


        }

        return $this->render('MaisonretraiteBundle:resident:ajoutre.html.twig', array('form' => $Form->createView()));
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

    public function exportAction(){
        $em = $this->getDoctrine()->getManager();
        $maisons = $em->getRepository("MaisonretraiteBundle:Resident")->findBy( array('etat' => 'valide'));

        $writer = $this->container->get('egyg33k.csv.writer');
        $csv = $writer::createFromFileObject(new \SplTempFileObject());
        $csv->insertOne(['Nom ', 'Prenom','Age','Sexe','Responsable','Telephone responsable','Maison']);
        foreach ($maisons as $maison){
            $csv->insertOne([$maison->getNomResident(), $maison->getPrenomResident(), $maison->getAgeResident(),$maison->getSexeResident(), $maison->getResponsable(), $maison->getTelephoneResponsable(),$maison->getMaison()->getNomMaison()]);

        }
        $csv->output('ListeResidents.csv');
        exit;
    }
    public function deletereAction($id,$idMaison)
    {
        $em = $this->getDoctrine()->getManager();
        $em1 = $this->getDoctrine()->getManager();

        $modele = $em->getRepository("MaisonretraiteBundle:Resident")->find($id);
        $em->remove($modele);
        $em->flush();
        $maisons = $em1->getRepository("MaisonretraiteBundle:Maison")->find($idMaison);
        $maisons->setNbrPersonne($maisons->getNbrPersonne()+1);
        $em1->persist($maisons);
        $em1->flush();

        return $this->redirectToRoute('affiche_re');
    }
    public function deletereAAction($id,$idMaison)
    {
        $em = $this->getDoctrine()->getManager();

        $em1 = $this->getDoctrine()->getManager();
        $modele = $em->getRepository("MaisonretraiteBundle:Resident")->find($id);
        $em->remove($modele);
        $em->flush();
        $maisons = $em1->getRepository("MaisonretraiteBundle:Maison")->find($idMaison);
        $maisons->setNbrPersonne($maisons->getNbrPersonne()+1);
        $em1->persist($maisons);
        $em1->flush();

        return $this->redirectToRoute('affiche_reA');
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
        $em = $this->getDoctrine()->getManager();

$r=new Resident();
            $notification = new Notification();
            $notification
                ->setTitle('Votre inscription est confirmé')
                ->setDescription('Bienvenue dans HappyOlds')
                ->setRoute('affiche_re')// I suppose you have a show route for your entity
                ->setParameters(array('id' => $r->getIdResident()))
            ;

        $em->persist($notification);
            $em->flush();
            $pusher = $this->get('mrad.pusher.notificaitons');
            $pusher->trigger($notification);

        return $this->redirectToRoute('affiche_reA');
    }

    public function allreAction()
    {
        $residents=$this->getDoctrine()->getManager()
            ->getRepository('MaisonretraiteBundle:Resident')
            ->findAll();
        $serializer=new Serializer([new ObjectNormalizer()]);
        $formatted=$serializer->normalize($residents);
        return new JsonResponse($formatted);
    }
    public function findreAction($id){

        $residents=$this->getDoctrine()->getManager()
            ->getRepository('MaisonretraiteBundle:Resident')
            ->find($id);
        $serializer=new Serializer([new ObjectNormalizer()]);
        $formatted=$serializer->normalize($residents);
        return new JsonResponse($formatted);
    }



    public function addreAction(Request $request){

        $em=$this->getDoctrine()->getManager();
//        $maison = $this->getDoctrine()->getManager()->getRepository("MaisonretraiteBundle:Maison")->find($idM);

        $resident = new Resident();
        $resident->setPrenomResident($request->get('prenomResident'));
        $resident->setNomResident($request->get('nomResident'));
        $resident->setAgeResident($request->get('ageResident'));
        $resident->setSexeResident($request->get('sexeResident'));
        $resident->setDateResident(new \DateTime($request->get('dateResident')));
        $resident->setAlzheimerResident($request->get('alzheimerResident'));
        $resident->setMaladieResident($request->get('maladieResident'));
        $resident->setResponsable($request->get('responsable'));
        $resident->setTelephoneResponsable($request->get('telephoneResponsable'));
        $resident->setEtat("invalide");
//        $resident->setIdMaison($maison);
        $em->persist($resident);
        $em->flush();
        $serializer=new Serializer([new ObjectNormalizer()]);
        $formatted=$serializer->normalize($resident);
        return new JsonResponse($formatted);


    }
    public function ajouterResidentMobileAction(Request $request,$idM)
    {
        $em = $this->getDoctrine()->getManager();
        $resident = new Resident();
        $resident->setNomResident($request->get('nomResident'));
        $resident->setPrenomResident($request->get('prenomResident'));
        $resident->setAgeResident($request->get('ageResident'));
        $resident->setResponsable($request->get('responsable'));
        $resident->setTelephoneResponsable($request->get('telephoneResponsable'));
        $maison=$em->getRepository('MaisonretraiteBundle:Maison')->find($idM);
        $resident->setMaison($maison);
        $resident->setSexeResident($request->get('sexeResident'));
        $resident->setDateResident(new \DateTime($request->get('dateResident')));
        $resident->setEtat("invalide");
        $em->persist($resident);
        $em->flush();
        $serializer=new Serializer([new ObjectNormalizer()]);
        $formatted=$serializer->normalize($resident);
        return new JsonResponse($formatted);
    }
    public function deleteMobileAction($id) {
        $em=$this->getDoctrine()->getManager();
        $resident=$em->getRepository("MaisonretraiteBundle:Resident")->find($id);
        $em->remove($resident);
        $em->flush();

        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($resident);
        return new JsonResponse($formatted);
    }

    public function modifMobileAction(Request $request,$id,$prenom,$nom,$age,$sexe,$responsable,$telephone){
        $em = $this->getDoctrine()->getManager();
        $resident = $em->getRepository("MaisonretraiteBundle:Resident")->find($id);
        $resident->setPrenomResident($prenom);
        $resident->setNomResident($nom);
        $resident->setAgeResident($age);
        $resident->setSexeResident($sexe);
        $resident->setResponsable($responsable);
        $resident->setTelephoneResponsable($telephone);
        $em->persist($resident);
        $em->flush();
        $serializer=new Serializer([new ObjectNormalizer()]);
        $formatted=$serializer->normalize($resident);
        return new JsonResponse($formatted);
    }
    public function validerMobileAction($idM)
    {
        $em1 = $this->getDoctrine()->getManager();
        $maisons = $em1->getRepository("MaisonretraiteBundle:Maison")->find($idM);

        $maisons->setNbrPersonne($maisons->getNbrPersonne()-1);
        $em1->persist($maisons);
        $em1->flush();
        $serializer=new Serializer([new ObjectNormalizer()]);
        $formatted=$serializer->normalize($maisons);
        return new JsonResponse($formatted);


    }
}
