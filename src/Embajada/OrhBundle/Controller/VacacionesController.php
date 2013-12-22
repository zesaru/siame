<?php

namespace Embajada\OrhBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Embajada\OrhBundle\Entity\Vacaciones;
use Embajada\OrhBundle\Form\VacacionesType;

/**
 * Vacaciones controller.
 *
 */
class VacacionesController extends Controller
{
    /**
     * Lists all Vacaciones entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('OrhBundle:Vacaciones')->listarVacacionesUsuarios();

        return $this->render('OrhBundle:Vacaciones:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Lists all Vacaciones entities.
     *
     */
    public function listarUsuariosAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('OrhBundle:Vacaciones')->listarUsuarios();

        return $this->render('OrhBundle:Vacaciones:listar.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Lists all Vacaciones entities.
     *
     */
    public function vistaAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('OrhBundle:Vacaciones')->findVistaVacaciones();

        return $this->render('OrhBundle:Vacaciones:vista.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Finds and displays a Vacaciones entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OrhBundle:Vacaciones')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vacaciones entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('OrhBundle:Vacaciones:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Vacaciones entity.
     *
     */
    public function newAction()
    {
        $usuario = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $usuarios = $em->getRepository('OrhBundle:Vacaciones')->findPersonal($usuario);
        if (!$usuarios) {
            throw $this->createNotFoundException('Unable Usuario');
        }
        
        $entity = new Vacaciones();
        $entity ->setFechadeinicio(new \DateTime());
        $entity ->setFechadefin(new \DateTime());

        $form   = $this->createForm(new VacacionesType(), $entity);

        return $this->render('OrhBundle:Vacaciones:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'usuarios' => $usuarios,
        ));
    }


    public function pdfAction($id)
    {
        $usuario = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $cantidadactual = $em->getRepository('OrhBundle:Vacaciones')->findPersonal($usuario);
        $entity = $em->getRepository('OrhBundle:Vacaciones')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable Vacaciones');
        }
        $response = $this->render('OrhBundle:Vacaciones:pdf.html.twig', array(
            'entity'      => $entity,
            'cantidadactual' =>$cantidadactual,
           ));
        //elimina la molesta cabecera 
        $html = $response->getContent();
        $pdf = $this->container->get("white_october.tcpdf")->create();
        $pdf->SetAuthor('Cesar Murillo');
        $pdf->SetTitle('Vacaciones');
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
     * Creates a new Vacaciones entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Vacaciones();
        $form = $this->createForm(new VacacionesType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $usuario = $this->getUser();
            $entity->setUcreado($usuario);
            $entity -> setFechadesolitud(new \DateTime());
            $diasdevaca= $entity->getCantidad();

            $em = $this->getDoctrine()->getManager();
            $cantidadactual = $em->getRepository('OrhBundle:Vacaciones')->findPersonal($usuario);
            $numvac = $em->getRepository('UserBundle:User')->find($usuario);
            $numvac->setNumerodediasdevacaciones($cantidadactual-$diasdevaca);
            $em->persist($entity);
            $em->flush();

            $email=$usuario."@embperujapan.org";
            $mensaje = \Swift_Message::newInstance()
                ->setSubject('Solicitud de Vacaciones')
                ->setFrom('vacaciones@embperujapan.org', "NO responder a este correo")
                ->setTo('msantivanez@embperujapan.org','Jefe de Cancillería')
                ->setBcc('eescala@embperujapan.org','Embajador')
                ->setCc($email)
                ->setBody(
                $this->renderView('OrhBundle:Vacaciones:email.html.twig', array(
            'entity' => $entity,
            'numvac' => $numvac,

            'id' => $entity->getId())),'text/html');     
                $this->get('mailer')->send($mensaje);

            
            return $this->redirect($this->generateUrl('vacaciones'));

        }

        return $this->render('OrhBundle:Vacaciones:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Vacaciones entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OrhBundle:Vacaciones')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vacaciones entity.');
        }

        $editForm = $this->createForm(new VacacionesType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('OrhBundle:Vacaciones:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Vacaciones entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OrhBundle:Vacaciones')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vacaciones entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new VacacionesType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('vacaciones_edit', array('id' => $id)));
        }

        return $this->render('OrhBundle:Vacaciones:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Vacaciones entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('OrhBundle:Vacaciones')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Vacaciones entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('vacaciones'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
