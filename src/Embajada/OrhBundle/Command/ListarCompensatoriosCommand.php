<?php

/*
 * (c) Cesar Murillo <namiayumis@gmail.com>
 *
 */
// src/Embajada/VacacionesBundle/Command/ListarCompenstoriosCommand.php

namespace Embajada\OrhBundle\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Output\Output;
use Symfony\Component\Console\Command\Command;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

/*
/Listar compensatorios
*/

class ListarCompensatoriosCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('compensatorios:listar')
            ->setDefinition(array())
            ->setDescription('Lista los compensatorios solicitados')
            ->setHelp(<<<EOT
El comando <info>compensatorios:listar</info> Lista los compensatorios solicitados
EOT
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
		{
			$contenedor = $this->getContainer();
			$em = $contenedor->get('doctrine')->getEntityManager();
			// Obtener el listado de fechas de solicitud de vacaciones
			//$consulta = $em->createQuery('SELECT o, u from OrhBundle:Compensatorios o 
            //JOIN o.ucreado u ORDER BY o.id DESC');
			$compensatorios = $em->getRepository("OrhBundle:Compensatorios")->findSolicitudesNoaprobadas();
        	
			//$vacaciones = $em->getRepository('OrhBundle:Vacaciones')->fechasaprobarvacaciones();
			
			//$nombre = $entities->getId();
			$output->writeln(sprintf(' Se van a enviar <info>%s</info> emails', count($compensatorios)));
			$i=0;
			foreach ($compensatorios as $compensatorio) {
					$nombre= $compensatorios[$i]->getUcreado();
					$output->writeln(sprintf($nombre));
					$i++;						
					}		
		}
}