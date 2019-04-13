<?php

namespace ActionBenevolatBundle\Controller;

use ActionBenevolatBundle\Entity\Type;
use ActionBenevolatBundle\Form\TypeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Type controller.
 *
 * @Route("type")
 */
class TypeController extends Controller
{
    public function afficheAction()
    {
        $em = $this->getDoctrine()->getManager();

        $types = $em->getRepository('ActionBenevolatBundle:Type')->findAll();

        return $this->render('ActionBenevolatBundle:type:index.html.twig', array(
            'types' => $types,
        ));
    }
    public function ajoutAction(Request $request)

    {
        $type=new Type();
        $Form = $this->createForm(TypeType::class,$type);
        $Form->handleRequest($request);

        if ($Form->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($type);
            $em->flush();
            return $this->redirectToRoute('show1');
        }

        return $this->render('ActionBenevolatBundle:type:new.html.twig', array('form' => $Form->createView()));
    }
    public function deleteAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $types = $em->getRepository("ActionBenevolatBundle:Type")->find($id);
        $em->remove($types);
        $em->flush();

        return $this->redirectToRoute('show1');
    }
    public function updateAction(Request $request, $id)

    {
        $em = $this->getDoctrine()->getManager();

        $type = $em->getRepository("ActionBenevolatBundle:Type")->find($id);
        $Form = $this->createForm(TypeType::class, $type);
        $Form->handleRequest($request);
        if ($Form->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('show1');

        }

        return $this->render('ActionBenevolatBundle:type:edit.html.twig', array('form' => $Form->createView()));
    }

}
