<?php

namespace Inicio\InicioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('InicioBundle:Default:index.html.twig');
    }
}
