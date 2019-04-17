<?php

namespace ActionBenevolatBundle\Controller;

use ActionBenevolatBundle\Entity\ActionBenevole;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ActionBenevolatBundle\Form\ActionBenevoleType;

use Symfony\Component\HttpFoundation\Request;


class ActionBenevoleController extends Controller
{
    public function afficheAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $actionBenevoles = $em->getRepository('ActionBenevolatBundle:ActionBenevole')->findAll();

        /**
         * @var $paginator \Knp\Component\Pager\Paginator
         */
        $paginator=$this->get('knp_paginator');
        $result=$paginator->paginate(
            $actionBenevoles,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',5)


        );
        return $this->render('ActionBenevolatBundle:actionbenevole:index.html.twig', array(
            'actionBenevoles' => $result,
        ));
    }
    public function affiche2Action(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $actionBenevoles = $em->getRepository('ActionBenevolatBundle:ActionBenevole')->findAll();

        /**
         * @var $paginator \Knp\Component\Pager\Paginator
         */
        $paginator=$this->get('knp_paginator');
        $result=$paginator->paginate(
            $actionBenevoles,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',5)


        );
        return $this->render('ActionBenevolatBundle:actionbenevole:showAdmin.html.twig', array(
            'actionBenevoles' => $result,
        ));
    }
    public function ajoutAction(Request $request)

    {

        $Form = $this->createForm(ActionBenevoleType::class);
        $Form->handleRequest($request);

        if ($Form->isSubmitted()) {
            $action = $Form->getData();
            $action->setEtat("invalide");
            $em = $this->getDoctrine()->getManager();
            $em->persist($action);
            $em->flush();
            return $this->redirectToRoute('affiche');
        }

        return $this->render('ActionBenevolatBundle:actionbenevole:new.html.twig', array('form' => $Form->createView()));
    }
    public function deleteAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $actionBenevoles = $em->getRepository("ActionBenevolatBundle:ActionBenevole")->find($id);
        $em->remove($actionBenevoles);
        $em->flush();

        return $this->redirectToRoute('affiche');
    }
    public function updateAction(Request $request, $id)

    {
        $em = $this->getDoctrine()->getManager();

        $actionbenevole = $em->getRepository("ActionBenevolatBundle:ActionBenevole")->find($id);
        $Form = $this->createForm(ActionBenevoleType::class, $actionbenevole);
        $Form->handleRequest($request);
        if ($Form->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('affiche');

        }

        return $this->render('ActionBenevolatBundle:actionbenevole:edit.html.twig', array('form' => $Form->createView()));
    }
}
