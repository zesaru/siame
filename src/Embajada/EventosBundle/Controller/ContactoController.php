<?php

namespace Embajada\EventosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Leg\GoogleChartsBundle\Charts\Gallery\PieChart;
use Embajada\EventosBundle\Entity\Contacto;
use Embajada\EventosBundle\Form\ContactoType;
use Ps\PdfBundle\Annotation\Pdf;
use Symfony\Component\HttpFoundation\Response;

/**
 * Contacto controller.
 *
 */
class ContactoController extends Controller
{
    /**
     * Lists all Contacto entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EventosBundle:Contacto')->listarinvitados();

        return $this->render('EventosBundle:Contacto:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Lists all Contacto invitados.
     *
     */
    public function invitadosAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EventosBundle:Contacto')->listarinvitados28();

        return $this->render('EventosBundle:Contacto:invitados.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Lists all invitaciones impresas.
     *
     */
    public function impresasAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EventosBundle:Contacto')->listarinvitados28impresas();

        return $this->render('EventosBundle:Contacto:impresas.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Lists all invitaciones enviadas.
     *
     */
    public function enviadasAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EventosBundle:Contacto')->listarinvitados28enviadas();

        return $this->render('EventosBundle:Contacto:enviadas.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Lists all invitaciones cotestadas.
     *
     */
    public function contestadasAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EventosBundle:Contacto')->listarinvitados28contestadas();

        return $this->render('EventosBundle:Contacto:contestadas.html.twig', array(
            'entities' => $entities,
        ));
    }    


    public function contestadasnoAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EventosBundle:Contacto')->listarinvitados28contestadasno();

        return $this->render('EventosBundle:Contacto:contestadasno.html.twig', array(
            'entities' => $entities,
        ));
    }
    public function sincontestarAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EventosBundle:Contacto')->sincontestar();

        return $this->render('EventosBundle:Contacto:sincontestar.html.twig', array(
            'entities' => $entities,
        ));
    }    
    /**
     * Finds and displays a Contacto entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EventosBundle:Contacto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contacto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EventosBundle:Contacto:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Contacto entity.
     *
     */
    public function newAction()
    {
        $entity = new Contacto();
        $entity ->setFechadeactualizacion(new \DateTime());
        $form   = $this->createForm(new ContactoType(), $entity);

        return $this->render('EventosBundle:Contacto:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Contacto entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Contacto();
        $form = $this->createForm(new ContactoType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('contactos_show', array('id' => $entity->getId())));
        }

        return $this->render('EventosBundle:Contacto:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Contacto entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();


        $entity = $em->getRepository('EventosBundle:Contacto')->find($id);
        $entity ->setFechadeactualizacion(new \DateTime());

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contacto entity.');
        }

        $editForm = $this->createForm(new ContactoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EventosBundle:Contacto:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Contacto entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EventosBundle:Contacto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contacto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ContactoType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('contactos', array('id' => $id)));
        }

        return $this->render('EventosBundle:Contacto:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Contacto entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EventosBundle:Contacto')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Contacto entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('contactos'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }

    public function noconfirmaronpdfAction()
    {
        $em = $this->getDoctrine()->getManager();
              
        $entity = $em->getRepository('EventosBundle:Contacto')->listarinvitados28contestadasno();
        $contacto=$em->getRepository('EventosBundle:Contacto')->sumatotalnoasistencia();

        $response = $this->render('EventosBundle:Contacto:noconfirmaronpdf.html.twig', array(
            'entities'      => $entity,
            'contactos'     => $contacto,  
           ));
        //elimina la molesta cabecera 
        $html = $response->getContent();
        $pdf = $this->container->get("white_october.tcpdf")->create();
        $pdf->SetAuthor('Cesar Murillo');
        $pdf->SetTitle('Impresas');
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
       // $pdf->
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        //set margins
        $pdf->SetMargins(10, 10, 10);
        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage('L', 'A3');
        // set core font
        $pdf->SetFont('helvetica', '', 10);
        // output the HTML content
        $pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true);
        $pdf->Ln();
        // reset pointer to the last page
        $pdf->lastPage();
        
        $pdf->Output('listaquerespondieronno.pdf', 'I');
    }
    public function confirmaronpdfAction()
    {
        $em = $this->getDoctrine()->getManager();
              
        $entity = $em->getRepository('EventosBundle:Contacto')->listarinvitados28contestadas();
        $contacto=$em->getRepository('EventosBundle:Contacto')->sumatotalasistencia();

        $response = $this->render('EventosBundle:Contacto:confirmaronpdf.html.twig', array(
            'entities'      => $entity,
            'contactos'     => $contacto,  
           ));
        //elimina la molesta cabecera 
        $html = $response->getContent();
        $pdf = $this->container->get("white_october.tcpdf")->create();
        $pdf->SetAuthor('Cesar Murillo');
        $pdf->SetTitle('Impresas');
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
       // $pdf->
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        //set margins
        $pdf->SetMargins(10, 10, 10);
        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage('L', 'A3');
        // set core font
        $pdf->SetFont('helvetica', '', 10);
        // output the HTML content
        $pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true);
        $pdf->Ln();
        // reset pointer to the last page
        $pdf->lastPage();
        
        $pdf->Output('listaquerespondieronnsi.pdf', 'I');
    }

    public function pruebaAction()
        {
        $em = $this->getDoctrine()->getManager();
        $confirmaron=$em->getRepository('EventosBundle:Contacto')->sumatotalasistencia();
        $noconfirmaron=$em->getRepository('EventosBundle:Contacto')->sumatotalnoasistencia();
        $invitados=$em->getRepository('EventosBundle:Contacto')->sumatotalinvitados();
        $web=$em->getRepository('EventosBundle:Contacto')->findVia("WEB");
        $email=$em->getRepository('EventosBundle:Contacto')->findVia("EMAIL");
        $fax=$em->getRepository('EventosBundle:Contacto')->findVia("FAX");
        $correo=$em->getRepository('EventosBundle:Contacto')->findVia("CORREO");
        $chart = new PieChart();
        $chart2 = new PieChart();
        $si= ($confirmaron*100) / $invitados;
        $no= ($noconfirmaron*100) / $invitados;
        $nosabe= (($invitados-$confirmaron-$noconfirmaron)*100)/$invitados;

        $chart2 ->setType("p3")
                ->setWidth(520)
                ->setHeight(280)
                ->setDatas(array($web, $email, $fax, $correo))
                ->setLabels(array($web." WEB", $email." EMAIL", $fax." FAX", $correo."CORREO"))
                ->setTitle("");

        $chart  ->setType("p3")
                ->setWidth(520)
                ->setHeight(280)
                ->setDatas(array($si, $no, $nosabe))
                ->setLabels(array($confirmaron." SI", $noconfirmaron." NO", ($invitados-$confirmaron-$noconfirmaron)."??"))
                ->setTitle("")
                ->setColors(array("00FF00","FF0000","0000FF"));
                
        $url = $this->get('leg_google_charts')->build($chart);
        $url2 = $this->get('leg_google_charts')->build($chart2);


            return $this->render('EventosBundle:Contacto:prueba.html.twig', array(
                'chart_url' => $url,
                'chart_url2' => $url2
            ));
        }

        public function prueba2Action()

    {
        $format = 'pdf';
        //$format = $this->get('_format');
        //$facade = $this->get('ps_pdf.facade');
        //$response = new Response();
        $em = $this->getDoctrine()->getManager();      
        $entity = $em->getRepository('EventosBundle:Contacto')->listarinvitados28();
        //$contacto=$em->getRepository('EventosBundle:Contacto')->sumatotalasistencia();

        //$this->render('EventosBundle:Contacto:confirmaron.pdf.twig', array(
         return $this->render(sprintf('EventosBundle:Contacto:confirmaron.%s.twig', $format), array(
            'entities'      => $entity,
            //'contactos'     => $contacto,  
           ));

        //$xml = $response->getContent();
        
        //$content = $facade->render($xml);
        
        //return new Response($content, 200, array('content-type' => 'application/pdf'));

    }   
}
