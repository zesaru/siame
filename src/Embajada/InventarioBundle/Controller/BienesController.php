<?php

namespace Embajada\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Embajada\InventarioBundle\Entity\Bienes;
use Embajada\InventarioBundle\Form\BienesType;

/**
 * Bienes controller.
 *
 */
class BienesController extends Controller
{
    /**
     * Lists all Bienes entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('InventarioBundle:Bienes')->findAll();

        return $this->render('InventarioBundle:Bienes:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Bienes entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InventarioBundle:Bienes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bienes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InventarioBundle:Bienes:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Bienes entity.
     *
     */
    public function newAction()
    {
        $entity = new Bienes();
        $form   = $this->createForm(new BienesType(), $entity);

        return $this->render('InventarioBundle:Bienes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Bienes entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Bienes();
        $form = $this->createForm(new BienesType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('Bienes_show', array('id' => $entity->getId())));
        }

        return $this->render('InventarioBundle:Bienes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Bienes entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InventarioBundle:Bienes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bienes entity.');
        }

        $editForm = $this->createForm(new BienesType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InventarioBundle:Bienes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Bienes entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InventarioBundle:Bienes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bienes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new BienesType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('Bienes_edit', array('id' => $id)));
        }

        return $this->render('InventarioBundle:Bienes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Bienes entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('InventarioBundle:Bienes')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Bienes entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('Bienes'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
