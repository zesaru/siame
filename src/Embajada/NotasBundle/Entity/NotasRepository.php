<?php
//src/Embajada/NotasBundle/Entitiy/NotasRepository.php

namespace Embajada\NotasBundle\Entity;

use Doctrine\ORM\EntityRepository;

class NotasRepository extends EntityRepository
{    
   
    public function findCodigoDeNota()
    {
        $em = $this->getEntityManager();
          $query = $em->createQuery('
            select max(n.numerodenota)
            from NotasBundle:Notas n
            where YEAR(n.fecha) = :hoy and n.aprobado=1
            ');
          $query->setParameter('hoy', new \DateTime(date("Y")));
        return $query->getSingleScalarResult(); 
        
        
    }

}