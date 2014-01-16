<?php

namespace Embajada\OrhBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Embajada\OrhBundle\Entity\Compensatorios;
use Embajada\OrhBundle\Form\CompensatoriosType;

/**
 * Compensatorios controller.
 *
 */
class CompensatoriosController extends Controller
{
    /**
     * Lists all Compensatorios entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('OrhBundle:Compensatorios')->findAll();

        return $this->render('OrhBundle:Compensatorios:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Crear una archivo de pdf.
     *
     */
    public function pdfAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OrhBundle:Compensatorios')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Compensatorios entity.');
        }

        $response = $this->render('OrhBundle:Compensatorios:pdf.html.twig', array(
            'entity'      => $entity,
           ));
        //ld($entity);
        //elimina la molesta cabecera 
        $html = $response->getContent();
        $pdf = $this->container->get("white_october.tcpdf")->create();
        $pdf->SetAuthor('Cesar Murillo');
        $pdf->SetTitle('Compensatorios');
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
        
        $pdf->Output('vacaciones.pdf', 'I');
    }

    /**
     * Finds and displays a Compensatorios entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OrhBundle:Compensatorios')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Compensatorios entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('OrhBundle:Compensatorios:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Compensatorios entity.
     *
     */
    public function newAction()
    {
        $entity = new Compensatorios();
        $form   = $this->createForm(new CompensatoriosType(), $entity);

        return $this->render('OrhBundle:Compensatorios:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Compensatorios entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Compensatorios();
        $form = $this->createForm(new CompensatoriosType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {

            $usuario = $this->getUser();

            $horadeinicio=$entity->getHoradeinicio();
            $entity->setHoradeinicio(new \DateTime($horadeinicio));

            $horadeinicio2=$entity->getHoradeinicio2();
            $entity->setHoradeinicio2(new \DateTime($horadeinicio2));

            $horadeinicio3=$entity->getHoradeinicio3();
            $entity->setHoradeinicio3(new \DateTime($horadeinicio3));

            $horadeinicio4=$entity->getHoradeinicio4();
            $entity->setHoradeinicio4(new \DateTime($horadeinicio4)); 

            $horadefin1=$entity->getHoradefin1();
            $entity->setHoradefin1(new \DateTime($horadefin1)); 

            $horadefin2=$entity->getHoradefin2();
            $entity->setHoradefin2(new \DateTime($horadefin2)); 

            $horadefin3=$entity->getHoradefin3();
            $entity->setHoradefin3(new \DateTime($horadefin3)); 

            $horadefin4=$entity->getHoradefin4();
            $entity->setHoradefin4(new \DateTime($horadefin4)); 
            
            $entity->setUcreado($usuario);

            $entity -> setFechadesolicitud(new \DateTime());
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('compensatorios_show', array('id' => $entity->getId())));
        }

        return $this->render('OrhBundle:Compensatorios:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Compensatorios entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OrhBundle:Compensatorios')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Compensatorios entity.');
        }

        $editForm = $this->createForm(new CompensatoriosType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('OrhBundle:Compensatorios:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Compensatorios entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OrhBundle:Compensatorios')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Compensatorios entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new CompensatoriosType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('compensatorios_edit', array('id' => $id)));
        }

        return $this->render('OrhBundle:Compensatorios:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Compensatorios entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('OrhBundle:Compensatorios')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Compensatorios entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('compensatorios'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
