<?php

namespace Embajada\OrhBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * CompensatoriosRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CompensatoriosRepository extends EntityRepository
{
	public function findSolicitudesNoaprobadas()
    {
        $em = $this->getEntityManager();
          $query = $em->createQuery('
            select c 
            from OrhBundle:Compensatorios c
            where  c.fechadesolicitud <=:fechai

            ');
          $query->setParameter('fechai', new \DateTime('-5days'));
          return $query->getResult();  
    }
}
