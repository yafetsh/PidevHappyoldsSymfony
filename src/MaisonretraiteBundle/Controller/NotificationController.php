<?php

namespace MaisonretraiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class NotificationController extends Controller
{
    public function displayAction(){
        $notifications = $this->getDoctrine()->getManager()->getRepository("MaisonretraiteBundle:Notification")->findAll();
        return $this->render('MaisonretraiteBundle:notification:notificaitons.html.twig',array(
            'notifications' => $notifications
        ));
    }
}
