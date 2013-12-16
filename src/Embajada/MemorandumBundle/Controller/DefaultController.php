<?php

namespace Embajada\MemorandumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MemorandumBundle:Default:index.html.twig', array('name' => $name));
    }
}
