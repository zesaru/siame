<?php
//src/Embajada/NotasBundle/Entitiy/NotasRepository.php

namespace Embajada\NotasBundle\Entity;

use Doctrine\ORM\EntityRepository;

class NotasRepository extends EntityRepository
{    
   
    public function findCodigoDeNota()
    {
        $em = $this->getEntityManager();
          $query = $em->createQueryBuilder()
            ->select('max(n.numerodenota)')
            ->from('NotasBundle:Notas', 'n')
            ->orderBy('n.numerodenota', 'ASC')
            ->getQuery();

        return $query->getSingleScalarResult(); 
        
        
    }
    
}