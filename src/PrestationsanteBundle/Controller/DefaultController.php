<?php

namespace PrestationsanteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Prestationsante/Default/index.html.twig');
    }
}
