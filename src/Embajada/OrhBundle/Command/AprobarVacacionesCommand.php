<?php

/*
 * (c) Cesar Murillo <namiayumis@gmail.com>
 *
 * El código fuente de la aplicación incluye un archivo llamado LICENSE
 * con toda la información sobre el copyright y la licencia.
 */
// src/Embajada/VacacionesBundle/Command/AprobarVacacionesCommand.php

namespace Embajada\OrhBundle\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Output\Output;
use Symfony\Component\Console\Command\Command;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

class AprobarVacacionesCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('vacaciones:aprobar')
            ->setDefinition(array())
            ->setDescription('Aprueba las vacaciones despues de 72 horas pasada')
            ->setHelp(<<<EOT
El comando <info>vacaciones:aprobar</info> Aprueba las vacaciones del solicitanto en un plazo de 72 horas.
EOT
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
		{
			$contenedor = $this->getContainer();
			$em = $contenedor->get('doctrine')->getEntityManager();
			// Obtener el listado de fechas de solicitud de vacaciones
			$vacaciones = $em->getRepository('OrhBundle:Vacaciones')->aprobarvacaciones();
			$fechas = array_map('current', $vacaciones);
			for ($i=0; $i <count($fechas) ; $i++) { 
				$fecha = date_create($fechas[$i]);
				$hoy = new \DateTime();

				if ($fecha<= $hoy) {
					$output->writeln('Es menor ...'.$hoy->format('Y-m-d H:i:s'));
				} else {
					$output->writeln('Es mayor ...'.$fecha->format('Y-m-d H:i:s'));
				}
				
				
			}
			
			// ...
		}

}