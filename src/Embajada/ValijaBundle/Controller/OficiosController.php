<?php

namespace Embajada\ValijaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Embajada\ValijaBundle\Entity\Oficios;
use Embajada\ValijaBundle\Form\OficiosType;
use Ps\PdfBundle\Annotation\Pdf;
use Symfony\Component\HttpFoundation\Response;

/**
 * Oficios controller.
 *
 */
class OficiosController extends Controller
{
    /**
     * Lists all Oficios entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ValijaBundle:Oficios')->findAll();

        return $this->render('ValijaBundle:Oficios:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Oficios entity.
     *
     */
    public function showAction($id)
    {
        /**
         * @Pdf()
         */
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ValijaBundle:Oficios')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Oficios entity.');
        }
        $format ='pdf';// $this->get('request')->get('_format');

            return $this->render(sprintf('ValijaBundle:Oficios:show.%s.twig', $format), array(
                'entity' => $entity,
            ));
    }


    //CREAR PDF
    public function pdfAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ValijaBundle:Oficios')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Oficios entity.');
        }

        $response = $this->render('ValijaBundle:Oficios:pdf.pdf.twig', array(
            'entity'      => $entity,
           ));
        //elimina la molesta cabecera 
        $html = $response->getContent();
        $pdf = $this->container->get("white_october.tcpdf")->create();
        $pdf->SetAuthor('Cesar Murillo');
        $pdf->SetTitle('Oficios');
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
       // $pdf->
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        //set margins
        $pdf->SetMargins(20, 13, 15);
        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage();
        
        // set core font
        $pdf->SetFont('helvetica', '', 10);

        // output the HTML content
        $pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true);

        $pdf->Ln();

        // reset pointer to the last page
        $pdf->lastPage();
        
        $pdf->Output('oficios.pdf', 'I');
    }

    /**
     * Displays a form to create a new Oficios entity.
     *
     */
    public function newAction()
    {
        $entity = new Oficios();
        $form   = $this->createForm(new OficiosType(), $entity);

        return $this->render('ValijaBundle:Oficios:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Oficios entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Oficios();
        $form = $this->createForm(new OficiosType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $usuario = $this->getUser();
            $entity->setUcreado($usuario);
            $entity -> setfecha(new \DateTime());
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('Oficios_show', array('id' => $entity->getId())));
        }

        return $this->render('ValijaBundle:Oficios:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Oficios entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ValijaBundle:Oficios')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Oficios entity.');
        }

        $editForm = $this->createForm(new OficiosType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ValijaBundle:Oficios:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Oficios entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ValijaBundle:Oficios')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Oficios entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new OficiosType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('Oficios_edit', array('id' => $id)));
        }

        return $this->render('ValijaBundle:Oficios:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Oficios entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ValijaBundle:Oficios')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Oficios entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('Oficios'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
