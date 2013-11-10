<?php

namespace Embajada\OrhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class vacaciones
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechadesolitud", type="date")
     */
    private $fechadesolitud;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechadeinicio", type="date")
     */
    private $fechadeinicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechadefin", type="date")
     */
    private $fechadefin;

    /**
     * @var string
     *
     * @ORM\Column(name="comentario", type="string", length=255)
     */
    private $comentario;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechadeaprobacion", type="date")
     */
    private $fechadeaprobacion;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="string", length=255)
     */
    private $observaciones;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Embajada\OrhBundle\Entity\Personal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idpersonal", referencedColumnName="id")
     * })
     */
    private $idpersonal;

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
     * Set fechadesolitud
     *
     * @param \DateTime $fechadesolitud
     * @return vacaciones
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
     * @return vacaciones
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
     * @return vacaciones
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
     * @return vacaciones
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
     * @return vacaciones
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
     * @return vacaciones
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
     * @return vacaciones
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
     * Set idpersonal
     *
     * @param \Embajada\OrhBundle\Entity\Personal $idpersonal
     * @return Vacaciones
     */
    public function setIdpersonal(\Embajada\OrhBundle\Entity\Personal $idpersonal = null)
    {
        $this->Idpersonal = $idpersonal;
    
        return $this;
    }

    /**
     * Get idpersonal
     *
     * @return \Embajada\OrhBundle\Entity\Personal 
     */
    public function getIdpersonal()
    {
        return $this->idpersonal;
    }    
}
