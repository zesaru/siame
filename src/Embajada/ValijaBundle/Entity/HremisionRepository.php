<?php
namespace Embajada\ValijaBundle\Entity;

use Doctrine\ORM\EntityRepository;

class HremisionRepository extends EntityRepository
{
    public function Aprobar($id)
    {
        $em = $this->getEntityManager();
          $query = $em->createQuery('
            update ValijaBundle:Hremision h
            set h.estado=1
            where h.id = :id');
          $query->setParameter('id', $id); 
    try {
        return $query->getSingleResult();
    } catch (\Doctrine\ORM\NoResultException $e) {
        return null;
    }
    }
}