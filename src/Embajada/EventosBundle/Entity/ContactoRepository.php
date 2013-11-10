<?php
//src/Embajada/EventosBundle/Entity/ContactoRepository.php
namespace Embajada\EventosBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ContactoRepository extends EntityRepository
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
    public function listarinvitados()
    {
        $em = $this->getEntityManager();
          $query = $em->createQuery('

            select c , cat
            from EventosBundle:contacto c JOIN c.categoria cat
            ');
          return $query->getResult(); 
        
        
    }

    public function listarinvitados28()
    {
        $em = $this->getEntityManager();
          $query = $em->createQuery('

            select c , cat
            from EventosBundle:contacto c JOIN c.categoria cat
            where c.observaciones=730 or c.observaciones=745 or c.observaciones=800 order by c.apellidos
            ');
          return $query->getResult();        
    }

    public function listarinvitados28impresas()
    {
        $em = $this->getEntityManager();
          $query = $em->createQuery('

            select   c , cat
            from EventosBundle:contacto c JOIN c.categoria cat
            where c.impresion=1
            ');
          return $query->getResult(); 
       
    }


    public function listarinvitados28enviadas()
    {
        $em = $this->getEntityManager();
          $query = $em->createQuery('

            select c , cat
            from EventosBundle:contacto c JOIN c.categoria cat
            where c.enviadas=1
            ');
          return $query->getResult(); 
        
        
    }

    public function listarinvitados28contestadas()
    {
        $em = $this->getEntityManager();
          $query = $em->createQuery('

            select c , cat
            from EventosBundle:contacto c JOIN c.categoria cat
            where c.contesto=1 ORDER BY c.organizacion ASC
            ');
          return $query->getResult(); 
        
        
    }

    public function listarinvitados28contestadasno()
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('
            select c , cat
            from EventosBundle:contacto c JOIN c.categoria cat
            where c.contesto=0 ORDER BY c.organizacion ASC
            ');
          return $query->getResult(); 
    }
    public function sincontestar()
    {
        $em = $this->getEntityManager();
          $query = $em->createQuery('

            select c , cat
            from EventosBundle:contacto c JOIN c.categoria cat
            where c.impresion=1 and c.contesto is NULL');
          return $query->getResult(); 
        
        
    }
    public function sumatotalasistencia()
    {
        $em = $this->getEntityManager();
          $query = $em->createQuery('

            select sum(c.num_respondidos) from EventosBundle:contacto c
            where c.contesto=1
            ');
          return $query->getSingleScalarResult();
        
        
    }
        public function sumatotalnoasistencia()
    {
        $em = $this->getEntityManager();
          $query = $em->createQuery('

            select sum(c.num_respondidos) from EventosBundle:contacto c
            where c.contesto=0
            ');
          return $query->getSingleScalarResult();
        
        
    }
        public function sumatotalinvitados()
    {
        $em = $this->getEntityManager();
          $query = $em->createQuery('

            select sum(c.num_invitados) from EventosBundle:contacto c
            ');
          return $query->getSingleScalarResult();    
    }
        
        public function findVia($via)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('
            select sum(c.impresion) from EventosBundle:contacto c
            where c.via = :via
            ');
          $query->setParameter('via', $via);
          return $query->getSingleScalarResult();    
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
        
        
    }
        $em = $this->getEntityManager();
          $query = $em->createQueryBuilder()
            ->select('max(n.numerodenota)')
            ->from('NotasBundle:Notas', 'n')
            ->orderBy('n.numerodenota', 'ASC')
            ->getQuery();

        return $query->getSingleScalarResult();     */
}