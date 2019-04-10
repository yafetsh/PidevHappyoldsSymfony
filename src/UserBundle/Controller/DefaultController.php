<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function userAction()
    {
        return $this->render('base.html.twig');
    }
    public function adminAction()
    {
        return $this->render('base1.html.twig');
    }
}
