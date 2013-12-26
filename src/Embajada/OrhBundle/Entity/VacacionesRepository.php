<?php
//src/Embajada/OrhBundle/Entitiy/VacacionesRepository.php
//, DATE_DIFF(v.fechadeinicio, v.fechadefin) as diferencia
//where v.fechadeinicio >= :fecha
namespace Embajada\OrhBundle\Entity;

use Doctrine\ORM\EntityRepository;

class VacacionesRepository extends EntityRepository
{    
   
    public function findVistaVacaciones()
    {
        $em = $this->getEntityManager();
          $query = $em->createQuery('
            select v.aprobado, v.fechadeinicio ,u.name , u.apellidos, DATE_DIFF(v.fechadefin, v.fechadeinicio) numDias
            from OrhBundle:Vacaciones v 
            JOIN v.ucreado u
            where  v.fechadefin between :fechai and :fechaf
            ');
          $query->setParameter('fechai', new \DateTime('-10days'));
          $query->setParameter('fechaf', new \DateTime('40days'));
          //CURRENT_DATE()
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
    public function listarUsuarios()
    {
        $em = $this->getEntityManager();
          $query = $em->createQuery('
            select u.id, u. name, u.apellidos
            from UserBundle:User u
            order By u.apellidos
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
   
//Este query es para command de aprobarvacaciones
   public function aprobarvacaciones()
    {
        $em = $this->getEntityManager();
          $query = $em->createQuery('
            select v.fechadesolitud 
            from OrhBundle:Vacaciones v
            ');
          return $query->getScalarResult(); 
    }
}