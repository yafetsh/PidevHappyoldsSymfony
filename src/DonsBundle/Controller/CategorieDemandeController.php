<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 08/04/2019
 * Time: 23:30
 */

namespace DonsBundle\Controller;

use http\Env\Request;

use DonsBundle\Entity\CategorieDemande;
use DonsBundle\Form\CategorieDemandeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategorieDemandeController extends Controller
{

    public function ajoutAction(\Symfony\Component\HttpFoundation\Request $request){

        $categorie=new CategorieDemande();
        if($request->isMethod('POST')) {
            //handlde request
            $categorie->setNomCategorie($request->get('categorie'));
            //handleRequest
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();
            return $this->redirectToRoute('affichecategorie');

        }
        return $this->render('@Dons/CategorieDon/ajout.html.twig');


    }

    public function afficheAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        if($request->isMethod('POST')) {
            //handlde request
            $categorie=new CategorieDemande();

            $categorie->setNomCategorie($request->get('categorie'));
            //handleRequest
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();
            return $this->redirectToRoute('affichecategorie');



        }
        //em(entitymanager) son role de gérer les entités
        $em=$this->getDoctrine()->getManager();
        $categorie=$em->getRepository("DonsBundle:CategorieDemande")->findAll();
        return $this->render('@Dons/CategorieDon/affiche.html.twig',array('m'=>$categorie));
    }

    public function modifAction(\Symfony\Component\HttpFoundation\Request $request,$id){
        $em=$this->getDoctrine()->getManager();
        $categorie=$em->getRepository("DonsBundle:CategorieDemande")->find($id);
        $Form=$this->createForm(CategorieDemandeType::class,$categorie);
        $Form->handleRequest($request);
        if($Form->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('affichecategorie');

        }

        return $this->render('@Dons/CategorieDon/modif.html.twig',array('form'=>$Form->createView()));

    }
    public function deleteAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        // $ki=$em->ge
        $categorie=$em->getRepository("DonsBundle:CategorieDemande")->find($id);
        $em->remove($categorie);
        $em->flush();
        return $this->redirectToRoute('affichecategorie');
    }



}