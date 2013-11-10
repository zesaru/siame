<?php
//src/Embajada/EventosBundle/Entity/EventoRepository.php
namespace Embajada\EventosBundle\Entity;

use Doctrine\ORM\EntityRepository;

class EventoRepository extends EntityRepository
{    
   
    /*public function findVistaVacaciones()
    {
        $em = $this->getEntityManager();
          $query = $em->createQuery('

            select v.fechadeinicio ,p.nombres , p.apellidos, DATE_DIFF(v.fechadefin, v.fechadeinicio) numDias
            from OrhBundle:Vacaciones v JOIN v.personal p
            where v.fechadeinicio >= :fecha
            ');
          $query->setParameter('fecha', new \DateTime('today'));
          return $query->getResult(); 
        
        
    }*/
    public function listarcatusueve()
    {
        $em = $this->getEntityManager();
          $query = $em->createQuery('

            select c , e
            from EventosBundle:Evento e JOIN e.contacto c
            ');
          return $query->getResult(); 
        
        
    }

    /*public function findPersonal($usuario)
    {
        $em = $this->getEntityManager();
          $query = $em->createQuery('

            select u, v
            from OrhBundle:Personal p JOIN u.usuario_id u
            where u.usuario_id = :usuario
            ');
          $query->setParameter('id', $usuario);
          return $query->getSingleScalarResult(); 
        
        
    }*/
}