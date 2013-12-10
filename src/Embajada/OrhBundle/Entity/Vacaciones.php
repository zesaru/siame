<?php

namespace Embajada\OrhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vacaciones
 *
 * @ORM\Table(name="vacaciones")
 * @ORM\Entity(repositoryClass="Embajada\OrhBundle\Entity\VacacionesRepository") 
 */
class Vacaciones
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechadesolitud", type="datetime", nullable=false)
     */
    private $fechadesolitud;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer", nullable=false)
     */
    private $cantidad;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechadeinicio", type="date", nullable=false)
     */
    private $fechadeinicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechadefin", type="date", nullable=false)
     */
    private $fechadefin;

    /**
     * @var string
     *
     * @ORM\Column(name="comentario", type="string", length=255, nullable=true)
     */
    private $comentario;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechadeaprobacion", type="date", nullable=true)
     */
    private $fechadeaprobacion;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="string", length=255, nullable=true)
     */
    private $observaciones;

    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="Embajada\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ucreado", referencedColumnName="id")
     * })
     */
    private $ucreado;



    /**
     * Set fechadesolitud
     *
     * @param \DateTime $fechadesolitud
     * @return Vacaciones
     */
    public function setFechadesolitud($fechadesolitud)
    {
        $this->fechadesolitud = $fechadesolitud;
    
        return $this;
    }

    /**
     * Get fechadesolitud
     *
     * @return \DateTime 
     */
    public function getFechadesolitud()
    {
        return $this->fechadesolitud;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     * @return Vacaciones
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    
        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set fechadeinicio
     *
     * @param \DateTime $fechadeinicio
     * @return Vacaciones
     */
    public function setFechadeinicio($fechadeinicio)
    {
        $this->fechadeinicio = $fechadeinicio;
    
        return $this;
    }

    /**
     * Get fechadeinicio
     *
     * @return \DateTime 
     */
    public function getFechadeinicio()
    {
        return $this->fechadeinicio;
    }

    /**
     * Set fechadefin
     *
     * @param \DateTime $fechadefin
     * @return Vacaciones
     */
    public function setFechadefin($fechadefin)
    {
        $this->fechadefin = $fechadefin;
    
        return $this;
    }

    /**
     * Get fechadefin
     *
     * @return \DateTime 
     */
    public function getFechadefin()
    {
        return $this->fechadefin;
    }

    /**
     * Set comentario
     *
     * @param string $comentario
     * @return Vacaciones
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;
    
        return $this;
    }

    /**
     * Get comentario
     *
     * @return string 
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * Set fechadeaprobacion
     *
     * @param \DateTime $fechadeaprobacion
     * @return Vacaciones
     */
    public function setFechadeaprobacion($fechadeaprobacion)
    {
        $this->fechadeaprobacion = $fechadeaprobacion;
    
        return $this;
    }

    /**
     * Get fechadeaprobacion
     *
     * @return \DateTime 
     */
    public function getFechadeaprobacion()
    {
        return $this->fechadeaprobacion;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return Vacaciones
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    
        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set ucreado
     *
     * @param \Embajada\UserBundle\Entity\User $ucreado
     * @return Notascd
     */
    public function setUcreado(\Embajada\UserBundle\Entity\User $ucreado = null)
    {
        $this->ucreado = $ucreado;
    
        return $this;
    }

    /**
     * Get ucreado
     *
     * @return \Embajada\UserBundle\Entity\User 
     */
    public function getUcreado()
    {
        return $this->ucreado;
    }


}