<?php

namespace Embajada\DocumentosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DocumentosBundle:Default:index.html.twig', array('name' => $name));
    }
}
