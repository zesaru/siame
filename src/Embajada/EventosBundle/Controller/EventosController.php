<?php

namespace Embajada\EventosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Embajada\EventosBundle\Entity\Eventos;
use Embajada\EventosBundle\Form\EventosType;

/**
 * Eventos controller.
 *
 */
class EventosController extends Controller
{
    /**
     * Lists all Eventos entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EventosBundle:Eventos')->findAll();

        return $this->render('EventosBundle:Eventos:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Eventos entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EventosBundle:Eventos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Eventos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EventosBundle:Eventos:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Eventos entity.
     *
     */
    public function newAction()
    {
        $entity = new Eventos();
        $form   = $this->createForm(new EventosType(), $entity);

        return $this->render('EventosBundle:Eventos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Eventos entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Eventos();
        $form = $this->createForm(new EventosType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('eventos_show', array('id' => $entity->getId())));
        }

        return $this->render('EventosBundle:Eventos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Eventos entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EventosBundle:Eventos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Eventos entity.');
        }

        $editForm = $this->createForm(new EventosType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EventosBundle:Eventos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Eventos entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EventosBundle:Eventos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Eventos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new EventosType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('eventos_edit', array('id' => $id)));
        }

        return $this->render('EventosBundle:Eventos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Eventos entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EventosBundle:Eventos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Eventos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('eventos'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
