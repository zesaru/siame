<?php

namespace Embajada\ValijaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ValijaBundle:Default:index.html.twig', array('name' => $name));
    }
}
