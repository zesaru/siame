<?php
//src/Embajada/NotasBundle/Entitiy/NotascdRepository.php

namespace Embajada\NotasBundle\Entity;

use Doctrine\ORM\EntityRepository;

class NotascdRepository extends EntityRepository
{    
   
    public function findCodigoDeNota()
    {
        $em = $this->getEntityManager();
          $query = $em->createQueryBuilder('
            select max(n.numerodenota)
            from NotasBundle:Notascd n
            where YEAR(n.fecha)=2014
            orderBy n.numerodenota ASC
            ');

        return $query->getSingleScalarResult(); 
    }
   
}