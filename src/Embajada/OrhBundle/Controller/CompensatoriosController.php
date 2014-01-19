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

        $consulta = $em->createQuery('SELECT o, u from OrhBundle:Compensatorios o 
            JOIN o.ucreado u ORDER BY o.id DESC');

        $entities = $consulta->getResult();

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

 
            
            $entity->setUcreado($usuario);

            $entity -> setFechadesolicitud(new \DateTime());
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();


           $email=$usuario."@embperujapan.org";
            $mensaje = \Swift_Message::newInstance()
                ->setSubject('Solicitud de Registo de Compensatorios')
                ->setFrom('vacaciones@embperujapan.org', "Solicitud de Registo de Compensatorios")
                //->setTo('msantivanez@embperujapan.org','Jefe de Cancillería')
                //->setBcc('eescala@embperujapan.org','Embajador')
                ->setTo($email)
                ->setBody(
                $this->renderView('OrhBundle:Compensatorios:email.html.twig', array(
            'entity' => $entity,

            'id' => $entity->getId())),'text/html');     
                $this->get('mailer')->send($mensaje);
                
            return $this->redirect($this->generateUrl('compensatorios_show', 
                array('id' => $entity->getId())));
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
