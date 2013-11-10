<?php

namespace Embajada\OrhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Compensatorio
 *
 * @ORM\Table(name="compensatorio")
 * @ORM\Entity
 */
class Compensatorio
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
     * @ORM\Column(name="fechadesolicitud", type="date", nullable=true)
     */
    private $fechadesolicitud;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechadeaprobacion", type="date", nullable=true)
     */
    private $fechadeaprobacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechadecomunicacion", type="date", nullable=true)
     */
    private $fechadecomunicacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="diassolicitados", type="integer", nullable=true)
     */
    private $diassolicitados;

    /**
     * @var integer
     *
     * @ORM\Column(name="diasautorizados", type="integer", nullable=true)
     */
    private $diasautorizados;



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
     * Set fechadesolicitud
     *
     * @param \DateTime $fechadesolicitud
     * @return Compensatorio
     */
    public function setFechadesolicitud($fechadesolicitud)
    {
        $this->fechadesolicitud = $fechadesolicitud;
    
        return $this;
    }

    /**
     * Get fechadesolicitud
     *
     * @return \DateTime 
     */
    public function getFechadesolicitud()
    {
        return $this->fechadesolicitud;
    }

    /**
     * Set fechadeaprobacion
     *
     * @param \DateTime $fechadeaprobacion
     * @return Compensatorio
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
     * Set fechadecomunicacion
     *
     * @param \DateTime $fechadecomunicacion
     * @return Compensatorio
     */
    public function setFechadecomunicacion($fechadecomunicacion)
    {
        $this->fechadecomunicacion = $fechadecomunicacion;
    
        return $this;
    }

    /**
     * Get fechadecomunicacion
     *
     * @return \DateTime 
     */
    public function getFechadecomunicacion()
    {
        return $this->fechadecomunicacion;
    }

    /**
     * Set diassolicitados
     *
     * @param integer $diassolicitados
     * @return Compensatorio
     */
    public function setDiassolicitados($diassolicitados)
    {
        $this->diassolicitados = $diassolicitados;
    
        return $this;
    }

    /**
     * Get diassolicitados
     *
     * @return integer 
     */
    public function getDiassolicitados()
    {
        return $this->diassolicitados;
    }

    /**
     * Set diasautorizados
     *
     * @param integer $diasautorizados
     * @return Compensatorio
     */
    public function setDiasautorizados($diasautorizados)
    {
        $this->diasautorizados = $diasautorizados;
    
        return $this;
    }

    /**
     * Get diasautorizados
     *
     * @return integer 
     */
    public function getDiasautorizados()
    {
        return $this->diasautorizados;
    }
}