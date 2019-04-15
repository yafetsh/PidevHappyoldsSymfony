<?php

namespace EventBundle\Controller;

use EventBundle\Entity\Evenement;
use EventBundle\Form\EvenementType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;


class EvenementController extends Controller
{

    public function showAction(Evenement $evenement)
    {


        return $this->render('evenement/showev.html.twig', array(
            'evenement' => $evenement,

        ));
    }
    public function afficheevAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $evenements = $em->getRepository('EventBundle:Evenement')->findAll();


        return $this->render('EventBundle:evenement:indexev.html.twig', array(
            'evenements' => $evenements,
        ));
    }

    public function ajoutevAction(Request $request)

    {
        $m = new Evenement();
        $Form = $this->createForm(EvenementType::class, $m);
        $Form->handleRequest($request);

        if ($Form->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($m);
            $em->flush();
            $message = (new \Swift_Message('Hello Email'))
                ->setFrom('send@example.com')
                ->setTo('chernisabrine32@gmail.com')
                ->setBody(
                    $this->renderView(
                        'EventBundle:evenement:mail.html.twig',
                        array('evenement' => $m)
                    ),
                    'text/html'
                );
            $this->get('mailer')->send($message);
            return $this->redirectToRoute('afficheev');


        }

        return $this->render('EventBundle:evenement:newev.html.twig', array('form' => $Form->createView()));

    }

    public function deleteevAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $evenement = $em->getRepository("EventBundle:Evenement")->find($id);
        if($evenement) {
            $em->remove($evenement);
            $em->flush();
        }

        return $this->redirectToRoute('afficheev');
    }

    public function updateAction(Request $request, $id)

    {
        $em = $this->getDoctrine()->getManager();
        $evenement = $em->getRepository("EventBundle:Evenement")->find($id);
        $Form = $this->createForm(EvenementType::class, $evenement);
        $Form->handleRequest($request);
        if ($Form->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('afficheev');

        }

        return $this->render('EventBundle:evenement:editev.html.twig', array('form' => $Form->createView()));
    }


    public function participationAction(Request $request, $evenementId)
    {
        $em = $this->getDoctrine()->getManager();
        $evenement = $em->getRepository("EventBundle:Evenement")->find($evenementId);
        $currentDate = new \DateTime('now');
        if ($evenement && $currentDate <= $evenement->getDateFEvenement()) {
            $form = $this->createFormBuilder()
                ->add('name', TextType::class)
                ->add('email', EmailType::class)
                ->add('send', SubmitType::class)
                ->getForm();

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                // data is an array with "name", "email", and "message" keys
                $data = $form->getData();
                $message = (new \Swift_Message('Hello Email'))
                    ->setFrom('send@example.com')
                    ->setTo($data['email'])
                    ->setBody(
                        $this->renderView(
                            'EventBundle:evenement:participationMail.html.twig',
                            array('data' => $data, 'evenement' => $evenement)
                        ),
                        'text/html'
                    );
                $this->get('mailer')->send($message);
                return $this->redirectToRoute('afficheev');
            }
            return $this->render('EventBundle:evenement:participer.html.twig', array('form' => $form->createView(), 'evenement' => $evenement));
        }
            return $this->redirectToRoute('afficheev');

    }



}