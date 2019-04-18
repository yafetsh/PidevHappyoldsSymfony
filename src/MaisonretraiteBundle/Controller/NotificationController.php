<?php

namespace MaisonretraiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class NotificationController extends Controller
{
    public function displayAction(){
        $notifications = $this->getDoctrine()->getManager()->getRepository("MaisonretraiteBundle:Notification")->findBy( array('title' => 'Un nouveau résident est inscrit'));
        return $this->render('MaisonretraiteBundle:notification:notificaitons.html.twig',array(
            'notifications' => $notifications
        ));
    }
    public function display2Action(){
        $notifications = $this->getDoctrine()->getManager()->getRepository("MaisonretraiteBundle:Notification")->findBy( array('title' => 'Votre inscription est confirmé'));
        return $this->render('MaisonretraiteBundle:notification:notificaitons.html.twig',array(
            'notifications' => $notifications
        ));
    }
}
