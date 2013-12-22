<?php

namespace Embajada\DocumentosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Embajada\DocumentosBundle\Entity\Memoi;
use Embajada\DocumentosBundle\Form\MemoiType;

/**
 * Memoi controller.
 *
 */
class MemoiController extends Controller
{
    /**
     * Lists all Memoi entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DocumentosBundle:Memoi')->findAll();

        return $this->render('DocumentosBundle:Memoi:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Memoi entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DocumentosBundle:Memoi')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Memoi entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DocumentosBundle:Memoi:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Memoi entity.
     *
     */
    public function newAction()
    {
        $entity = new Memoi();
        $form   = $this->createForm(new MemoiType(), $entity);

        return $this->render('DocumentosBundle:Memoi:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Memoi entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Memoi();
        $form = $this->createForm(new MemoiType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $usuario = $this->getUser();
            $entity->setUcreado($usuario);
            $entity -> setfecha(new \DateTime());
            $em = $this->getDoctrine()->getManager();
            //$this->get('session')->getFlashBag()->add('notice', 'Sus cambios han sido guardados !'.$desti);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('Memoi_show', array('id' => $entity->getId())));
        }

        return $this->render('DocumentosBundle:Memoi:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    //CREAR PDF
    public function pdfAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DocumentosBundle:Memoi')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Memoi entity.');
        }

        $response = $this->render('DocumentosBundle:Memoi:pdf.pdf.twig', array(
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
        
        $pdf->Output('Memorandum.pdf', 'I');
    }
    /**
     * Displays a form to edit an existing Memoi entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DocumentosBundle:Memoi')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Memoi entity.');
        }
        $editForm = $this->createForm(new MemoiType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DocumentosBundle:Memoi:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Memoi entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DocumentosBundle:Memoi')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Memoi entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new MemoiType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $usuario = $this->getUser();
            $entity->setUcreado($usuario);
            $entity -> setfecha(new \DateTime());
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('Memoi'));
        }

        return $this->render('DocumentosBundle:Memoi:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Memoi entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DocumentosBundle:Memoi')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Memoi entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('Memoi'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
