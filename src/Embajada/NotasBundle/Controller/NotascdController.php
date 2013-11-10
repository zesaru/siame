<?php

namespace Embajada\NotasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Embajada\NotasBundle\Entity\Notascd;
use Embajada\NotasBundle\Form\NotascdType;

/**
 * Notascd controller.
 *
 */
class NotascdController extends Controller
{
    /**
     * Lists all Notascd entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('NotasBundle:Notascd')->findAll();

        return $this->render('NotasBundle:Notascd:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Notascd entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        


        $entity = $em->getRepository('NotasBundle:Notascd')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Biblioteca entity.');
        }

    

        $response = $this->render('NotasBundle:Notascd:show.html.twig', array(
            'entity'      => $entity,
           ));
        
        
        //elimina la molesta cabecera 
        $html = $response->getContent();
        
        $pdf = $this->container->get("white_october.tcpdf")->create();

        $pdf->SetAuthor('Cesar Murillo');
        $pdf->SetTitle('Notas');
        
        
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);



       // $pdf->
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        //set margins
        $pdf->SetMargins(25, 17, 25);

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
        
        $pdf->Output('notasdiplomatica.pdf', 'I');
        
        

    }

    /**
     * Displays a form to create a new Notascd entity.
     *
     */
    public function newAction()
    {
        $entity = new Notascd();
        $entity ->setFecha(new \DateTime());

        $form   = $this->createForm(new NotascdType(), $entity);

        return $this->render('NotasBundle:Notascd:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Notascd entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Notascd();
        $form = $this->createForm(new NotascdType(), $entity);
        $form->bind($request);
        if ($form->isValid()) {
            $usuario = $this->getUser();
            $entity->setUcreado($usuario);
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('notascd'));
        }
        return $this->render('NotasBundle:Notascd:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    /**
     * Displays a form to edit an existing Notascd entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('NotasBundle:Notascd')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Notascd entity.');
        }

        $editForm = $this->createForm(new NotascdType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('NotasBundle:Notascd:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Notascd entity.
     *
     */
    public function updateAction(Request $request, $id)
        {
        $peticion =  $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        $notascd = $em->getRepository('NotasBundle:Notascd')->find($id);

        $editForm = $this->createForm(new NotascdType(), $notascd);
        
        
        if ($peticion->getMethod() == 'POST') {

            $editForm->bindRequest($peticion);
            
        if (!$notascd) {
            throw $this->createNotFoundException('Unable to find Notas entity.');
        }

        if ($editForm->isValid()) {

            //$this->get('session')->getFlashBag()->add('notice', 'Sus cambios han sido guardados !');
            $aprobado = $editForm->getData()->getAprobado();
            
        if ($aprobado==1){
            //throw $this->createNotFoundException('Creo que a Cesar le falta trabajar mas en esto.');


            $consulta = $em->getRepository('NotasBundle:Notascd')->findCodigoDeNota(); 
            
            $notascd->setNumerodenota($consulta+1);
            
            $usuario = $this->getUser();
            $notascd->setUaprobado($usuario);            
            $em->persist($notascd);

        }

            $em->flush();
            

            return $this->redirect($this->generateUrl('notascd'));
                        
        }}

        return $this->render('NotasBundle:Notascd:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            //'delete_form' => $deleteForm->createView(),
        ));
    }


    /**
     * Deletes a Notascd entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('NotasBundle:Notascd')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Notascd entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('notascd'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
