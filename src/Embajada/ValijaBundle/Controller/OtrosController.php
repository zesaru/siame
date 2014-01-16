<?php

namespace Embajada\ValijaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Embajada\ValijaBundle\Entity\Otros;
use Embajada\ValijaBundle\Form\OtrosType;

/**
 * Otros controller.
 *
 */
class OtrosController extends Controller
{
    /**
     * Lists all Otros entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ValijaBundle:Otros')->findAll();

        return $this->render('ValijaBundle:Otros:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Otros entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ValijaBundle:Otros')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Otros entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ValijaBundle:Otros:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Otros entity.
     *
     */
    public function newAction()
    {
        $entity = new Otros();
        $form   = $this->createForm(new OtrosType(), $entity);

        return $this->render('ValijaBundle:Otros:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Otros entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Otros();
        $form = $this->createForm(new OtrosType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('otros_show', array('id' => $entity->getId())));
        }

        return $this->render('ValijaBundle:Otros:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Otros entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ValijaBundle:Otros')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Otros entity.');
        }

        $editForm = $this->createForm(new OtrosType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ValijaBundle:Otros:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Otros entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ValijaBundle:Otros')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Otros entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new OtrosType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('otros_edit', array('id' => $id)));
        }

        return $this->render('ValijaBundle:Otros:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Otros entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ValijaBundle:Otros')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Otros entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('otros'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
