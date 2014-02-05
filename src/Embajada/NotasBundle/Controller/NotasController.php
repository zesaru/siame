<?php

namespace Embajada\NotasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Embajada\NotasBundle\Entity\Notas;
use Embajada\NotasBundle\Form\NotasType;

/**
 * Notas controller.
 *
 */
class NotasController extends Controller
{
    /**
     * Lists all Notas entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery(
        'SELECT n FROM NotasBundle:Notas n ORDER BY n.fecha DESC');

        $entities = $query->getResult();
        return $this->render('NotasBundle:Notas:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Notas entity.
     *
     */
    
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        


        $entity = $em->getRepository('NotasBundle:Notas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Biblioteca entity.');
        }

    

        $response = $this->render('NotasBundle:Notas:show.html.twig', array(
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
        $pdf->SetMargins(15, 10,10,10);

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
        
        $pdf->Output('notasdiplomatica.pdf', 'I');
        
        

    }
    
    public function showAction2($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('NotasBundle:Notas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Notas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('NotasBundle:Notas:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Notas entity.
     *
     */
        public function newAction()
    {
        $entity = new Notas();
        $entity ->setFecha(new \DateTime());        
        $form   = $this->createForm(new NotasType(), $entity);


        return $this->render('NotasBundle:Notas:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    public function newAction2()
    {
        $entity = new Notas();
        $form   = $this->createForm(new NotasType(), $entity);

        return $this->render('NotasBundle:Notas:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Notas entity.
     *
     */
    public function createAction(Request $request)
        {
            $entity  = new Notas();
            $form = $this->createForm(new NotasType(), $entity);
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                $em->flush();

            }return $this->redirect($this->generateUrl('notas'));

            return $this->render('NotasBundle:Notas:new.html.twig', array(
                'entity' => $entity,
                'form'   => $form->createView(),
            ));
        }

    /**
     * Displays a form to edit an existing Notas entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('NotasBundle:Notas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('No se puede encontrar el item.');
        }

        $editForm = $this->createForm(new NotasType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('NotasBundle:Notas:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));

    }

    /**
     * Edits an existing Notas entity.
     *
     */
    public function updateAction(Request $request, $id)
            
    {
        $peticion =  $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        $notas = $em->getRepository('NotasBundle:Notas')->find($id);

        $editForm = $this->createForm(new NotasType(), $notas);
        
        
        if ($peticion->getMethod() == 'POST') {

            $editForm->bindRequest($peticion);
            
        if (!$notas) {
            throw $this->createNotFoundException('Unable to find Notas entity.');
        }

        if ($editForm->isValid()) {

            //$this->get('session')->getFlashBag()->add('notice', 'Sus cambios han sido guardados !');
            $aprobado = $editForm->getData()->getAprobado();
            
        if ($aprobado==1){
            //throw $this->createNotFoundException('Creo que a Cesar le falta trabajar mas en esto.');
            
            $consulta = $em->getRepository('NotasBundle:Notas')->findCodigoDeNota(); 
            $notas->setNumerodenota($consulta+1);
            $notas->setFecha(new \DateTime());
            $em->persist($notas);

        }

            $em->flush();
            

            return $this->redirect($this->generateUrl('notas'));
                        
        }}

        return $this->render('NotasBundle:Notas:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            //'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Notas entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('NotasBundle:Notas')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Notas entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('notas'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
