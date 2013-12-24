<?php

namespace Embajada\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Embajada\InventarioBundle\Entity\Libros;
use Embajada\InventarioBundle\Form\LibrosType;

/**
 * Libros controller.
 *
 */
class LibrosController extends Controller
{
    /**
     * Lists all Libros entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('InventarioBundle:Libros')->findAll();

        return $this->render('InventarioBundle:Libros:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Libros entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InventarioBundle:Libros')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Libros entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InventarioBundle:Libros:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Libros entity.
     *
     */
    public function newAction()
    {
        $entity = new Libros();
        $form   = $this->createForm(new LibrosType(), $entity);

        return $this->render('InventarioBundle:Libros:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Libros entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Libros();
        $form = $this->createForm(new LibrosType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('Libros_show', array('id' => $entity->getId())));
        }

        return $this->render('InventarioBundle:Libros:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Libros entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InventarioBundle:Libros')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Libros entity.');
        }

        $editForm = $this->createForm(new LibrosType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InventarioBundle:Libros:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Libros entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InventarioBundle:Libros')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Libros entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new LibrosType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('Libros_edit', array('id' => $id)));
        }

        return $this->render('InventarioBundle:Libros:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Libros entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('InventarioBundle:Libros')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Libros entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('Libros'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
