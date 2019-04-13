<?php

namespace ActiviteBundle\Controller;

use ActiviteBundle\Entity\Activite;
use ActiviteBundle\Entity\Postcomment;
use ActiviteBundle\Form\ActiviteType;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ActiviteController extends Controller


{


    public function listacAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $activites = $em->getRepository('ActiviteBundle:Activite')->findAll();
        return $this->render('ActiviteBundle:activite:listac.html.twig', array(
            'activites' => $activites ,
        ));
    }


    public function showdetailedAction($id)
    {
        $em= $this->getDoctrine()->getManager();
        $p=$em->getRepository('ActiviteBundle:Activite')->find($id);
        return $this->render('ActiviteBundle:activite:detailedac.html.twig', array(
            'title'=>$p->getNomActivite(),
            'date'=>$p->getDateActivite(),
            'photo'=>$p->getPhoto(),
            'descripion'=>$p->getDescriptionActivite(),
            'posts'=>$p,
            'comments'=>$p,
            'id'=>$p->getIdActivite()
        ));
    }

        public function showacAction(Activite $activite)
    {



        return $this->render('ActiviteBundle:activite:showac.html.twig', array(
            'activite' => $activite ,

        ));
    }

    public function addCommentAction(Request $request, UserInterface $user)
    {
        //if ($this->container->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_ANONYMOUSLY')) {
        //   return new RedirectResponse('/login');
        //}
        //$this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY', null, 'unable to access this page.');

        $ref = $request->headers->get('referer');

        $post = $this->getDoctrine()
            ->getRepository(Activite::class)
            ->findActiviteByid($request->request->get('idactivite'));

        $comment = new Postcomment();

        $comment->setUser($user);
        $comment->setPost($post);
        $comment->setContent($request->request->get('comment'));
        $em = $this->getDoctrine()->getManager();
        $em->persist($comment);
        $em->flush();


        return $this->redirect($ref);

    }




    public function afficheacAction()
    {
        $em = $this->getDoctrine()->getManager();

        $activites = $em->getRepository('ActiviteBundle:Activite')->findAll();

        return $this->render('ActiviteBundle:activite:afficheac.html.twig', array(
            'activites' => $activites,
        ));
    }

    public function ajouteacAction(Request $request)

    {
        $activite = new Activite();
        $Form = $this->createForm(ActiviteType::class, $activite);
        $Form->handleRequest($request);

        if ($Form->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $file = $activite->getPhoto();
            $filename= md5(uniqid()) . '.' . $file->guessExtension();
            $file->move($this->getParameter('photos_directory'), $filename);
            $activite->setPhoto($filename);

            $em->persist($activite);
            $em->flush();

            return $this->redirectToRoute('affiche_ac');


        }

        return $this->render('ActiviteBundle:activite:ajouteac.html.twig', array('form' => $Form->createView()));
    }

    public function deleteacAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $activite = $em->getRepository("ActiviteBundle:Activite")->find($id);
        $em->remove($activite);
        $em->flush();

        return $this->redirectToRoute('affiche_ac');
    }

    public function updateacAction(Request $request, $id)

    {
        $em = $this->getDoctrine()->getManager();
        $activite = $em->getRepository("ActiviteBundle:Activite")->find($id);
        $Form = $this->createForm(ActiviteType::class, $activite);
        $Form->handleRequest($request);
        if ($Form->isSubmitted()) {


            $file = $activite->getPhoto();
            $filename= md5(uniqid()) . '.' . $file->guessExtension();
            $file->move($this->getParameter('photos_directory'), $filename);
            $activite->setPhoto($filename);

            $em->persist($activite);
            $em->flush();

            return $this->redirectToRoute('affiche_ac');

        }

        return $this->render('ActiviteBundle:activite:editac.html.twig', array('form' => $Form->createView()));
    }
    public function rechercheAction(Request $request)

    {

        $em = $this->getDoctrine()->getManager();
        $activites = $em->getRepository("ActiviteBundle:Activite")
            ->findAll();
        if($request->isMethod("post")){
            $criteria = $request->get('nom_activite');

            $activites = $em->getRepository("ActiviteBundle:Activite")
                ->findBy(array('nomActivite'=>$criteria));

        }



        return $this->render('ActiviteBundle:activite:afficheac.html.twig', array("activites"=>$activites));
    }




}
