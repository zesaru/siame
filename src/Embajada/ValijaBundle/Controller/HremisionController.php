<?php

namespace Embajada\ValijaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Embajada\ValijaBundle\Entity\Hremision;
use Embajada\ValijaBundle\Form\HremisionType;

/**
 * Hremision controller.
 *
 */
class HremisionController extends Controller
{
    /**
     * Lists all Hremision entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ValijaBundle:Hremision')->findAll();

        return $this->render('ValijaBundle:Hremision:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Hremision entity.
     *
     */
public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ValijaBundle:Hremision')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Biblioteca entity.');
        }

    

        $response = $this->render('ValijaBundle:Hremision:impresion.html.twig', array(
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
        $pdf->SetMargins(20,5,10);

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
        
        $pdf->Output('hojasderemision.pdf', 'I');
        
        

    }        
         
    public function show2Action($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ValijaBundle:Hremision')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Hremision entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ValijaBundle:Hremision:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Hremision entity.
     *
     */
    public function newAction()
    {
        $entity = new Hremision();
        $entity ->setFecha(new \DateTime());
        $form   = $this->createForm(new HremisionType(), $entity);

        return $this->render('ValijaBundle:Hremision:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Hremision entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Hremision();
        $form = $this->createForm(new HremisionType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('hremision_show', array('id' => $entity->getId())));
        }

        return $this->render('ValijaBundle:Hremision:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Hremision entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ValijaBundle:Hremision')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Hremision entity.');
        }

        $editForm = $this->createForm(new HremisionType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ValijaBundle:Hremision:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Hremision entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ValijaBundle:Hremision')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Hremision entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new HremisionType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('hremision_edit', array('id' => $id)));
        }

        return $this->render('ValijaBundle:Hremision:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Hremision entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ValijaBundle:Hremision')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Hremision entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('hremision'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
