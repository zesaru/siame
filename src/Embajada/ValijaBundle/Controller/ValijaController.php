<?php

namespace Embajada\ValijaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Embajada\ValijaBundle\Entity\Valija;
use Embajada\ValijaBundle\Form\ValijaType;

/**
 * Valija controller.
 *
 */
class ValijaController extends Controller
{
    /**
     * Lists all Valija entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ValijaBundle:Valija')->findAll();
        return $this->render('ValijaBundle:Valija:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Valija entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ValijaBundle:Valija')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Valija entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ValijaBundle:Valija:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Crear un archivo PDF de la guia de valija.
     *
     */
    public function pdfAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ValijaBundle:Valija')->find($id);
        $hojaderemision = $em->getRepository('ValijaBundle:Hremision')->findByValija($id);
        $oficios = $em->getRepository('ValijaBundle:Oficios')->findByNumerodevalija($id);
        $otros = $em->getRepository('ValijaBundle:Otros')->findByValija($id);
        //ld($hojaderemision);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Valija entity.');
        }
        //ld($numero);
        $response = $this->render('ValijaBundle:Valija:guia.html.twig', array(
            'entity'      => $entity,
            'hojaderemision'      => $hojaderemision,
            'oficios'      => $oficios,
            'otros'      => $otros,
           ));
        //elimina la molesta cabecera 
        $html = $response->getContent();
        $pdf = $this->container->get("white_october.tcpdf")->create();
        $pdf->SetAuthor('Cesar Murillo');
        $pdf->SetTitle('Guia de Valija');
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
       // $pdf->
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        //set margins
        $pdf->SetMargins(17,5,14);
        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage();
        // set core font
        $pdf->SetFont('helvetica', '', 10);
        // output the HTML content
        $pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=false);
        $pdf->Ln();
        // reset pointer to the last page
        $pdf->lastPage();

        $pdf->Output('guiadevalija.pdf', 'I');
    }

    /**
     * Displays a form to create a new Valija entity.
     *
     */
    public function newAction()
    {
        $entity = new Valija();
        $form   = $this->createForm(new ValijaType(), $entity);

        return $this->render('ValijaBundle:Valija:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Valija entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Valija();
        $form = $this->createForm(new ValijaType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('valija_show', array('id' => $entity->getId())));
        }

        return $this->render('ValijaBundle:Valija:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Valija entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ValijaBundle:Valija')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Valija entity.');
        }

        $editForm = $this->createForm(new ValijaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ValijaBundle:Valija:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Valija entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ValijaBundle:Valija')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Valija entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ValijaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('valija_edit', array('id' => $id)));
        }

        return $this->render('ValijaBundle:Valija:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Valija entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ValijaBundle:Valija')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Valija entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('valija'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
