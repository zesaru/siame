<?php
//src/Embajada/NotasBundle/Entitiy/NotascdRepository.php

namespace Embajada\NotasBundle\Entity;

use Doctrine\ORM\EntityRepository;

class NotascdRepository extends EntityRepository
{    
   
    public function findCodigoDeNota()
    {
        $em = $this->getEntityManager();
          $query = $em->createQueryBuilder()
            ->select('max(n.numerodenota)')
            ->from('NotasBundle:Notascd', 'n')
            ->orderBy('n.numerodenota', 'ASC')
            ->getQuery();

        return $query->getSingleScalarResult(); 
        
        
    }
    
}