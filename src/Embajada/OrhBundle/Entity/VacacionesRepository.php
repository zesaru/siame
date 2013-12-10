<?php
//src/Embajada/OrhBundle/Entitiy/VacacionesRepository.php
//, DATE_DIFF(v.fechadeinicio, v.fechadefin) as diferencia
namespace Embajada\OrhBundle\Entity;

use Doctrine\ORM\EntityRepository;

class VacacionesRepository extends EntityRepository
{    
   
    public function findVistaVacaciones()
    {
        $em = $this->getEntityManager();
          $query = $em->createQuery('

            select v.fechadeinicio ,p.nombres , p.apellidos, DATE_DIFF(v.fechadefin, v.fechadeinicio) numDias
            from OrhBundle:Vacaciones v JOIN v.personal_id p
            where v.fechadeinicio >= :fecha
            ');
          $query->setParameter('fecha', new \DateTime('today'));
          return $query->getResult(); 
        
        
    }
    public function listarVacacionesUsuarios()
    {
        $em = $this->getEntityManager();
          $query = $em->createQuery('

            select v.id, u.apellidos, v.fechadeinicio, v.fechadesolitud, v.cantidad, v.fechadefin, u.name
            from OrhBundle:Vacaciones v 
            JOIN v.ucreado u
            ');
          return $query->getResult(); 
        
        
    }

    public function findPersonal($usuario)
    {
        $em = $this->getEntityManager();
          $query = $em->createQuery('
            select u.numerodediasdevacaciones
            from UserBundle:User u
            where u.id = :id');
          $query->setParameter('id', $usuario);
          return $query->getSingleScalarResult(); 
    }

   public function actualizarvacaciones($usuario, $numvac)
    {
        $em = $this->getEntityManager();
          $query = $em->createQuery('
            update UserBundle:User u
            set u.nmerodediasdevacaciones = :u.numerodediasdevacaciones-num
            where u.id = :id');
          $query->setParameter('id', $usuario);
          $query->setParameter('num',$numvac);
    }
}