<?php

namespace Embajada\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\UserBundle\Model\User as BaseUser;

class HremisionController extends Controller
{
    /**
     * Lists all Hremision entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UserBundle:User')->findAll();

        return $this->render('UserBundle:Default:listarusuarios.html.twig', array(
            'entities' => $entities,
        ));
    }
}