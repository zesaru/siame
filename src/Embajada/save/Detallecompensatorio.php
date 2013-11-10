<?php

namespace Embajada\OrhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Detallecompensatorio
 *
 * @ORM\Table(name="detallecompensatorio")
 * @ORM\Entity
 */
class Detallecompensatorio
{
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Embajada\OrhBundle\Entity\Compensatorio")
     */
    private $idcompensatorio;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Embajada\OrhBundle\Entity\Personal")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="actividad", type="string", length=255, nullable=false)
     */
    private $actividad;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horadeinicio", type="time", nullable=true)
     */
    private $horadeinicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horadefin", type="time", nullable=true)
     */
    private $horadefin;

    /**
     * @var string
     *
     * @ORM\Column(name="autoridad", type="string", length=255, nullable=true)
     */
    private $autoridad;



    /**
     * Set idcompensatorio
     *
     * @param Embajada\OrhBundle\Entity\Compensatorio $compensatorio
     */
    public function setCompensatorio(Embajada\OrhBundle\Entity\Compensatorio $compensatorio)
    {
        $this->compensatorio = $compensatorio;
    
    }

    /**
     * Get compensatorio
     *
     * @return Embajada\OrhBundle\Entity\Compensatorio 
     */
    public function getcompensatorio()
    {
        return $this->compensatorio;
    }

    /**
     * Set idusuario
     *
     * @param Embajada\OrhBundle\Entity\Usuario $usuario
     */
    public function setUsuario(Embajada\OrhBundle\Entity\Usuario $usuario)
    {
        $this->usuario = $usuario;
    
        return $this;
    }

    /**
     * Get idusuario
     *
     * @return Embajada\OrhBundle\Entity\Usuario 
     */
    public function getusuario()
    {
        return $this->usuario;
    }

    /**
     * Set actividad
     *
     * @param string $actividad
     * @return Detallecompensatorio
     */
    public function setActividad($actividad)
    {
        $this->actividad = $actividad;
    
        return $this;
    }

    /**
     * Get actividad
     *
     * @return string 
     */
    public function getActividad()
    {
        return $this->actividad;
    }

    /**
     * Set horadeinicio
     *
     * @param \DateTime $horadeinicio
     * @return Detallecompensatorio
     */
    public function setHoradeinicio($horadeinicio)
    {
        $this->horadeinicio = $horadeinicio;
    
        return $this;
    }

    /**
     * Get horadeinicio
     *
     * @return \DateTime 
     */
    public function getHoradeinicio()
    {
        return $this->horadeinicio;
    }

    /**
     * Set horadefin
     *
     * @param \DateTime $horadefin
     * @return Detallecompensatorio
     */
    public function setHoradefin($horadefin)
    {
        $this->horadefin = $horadefin;
    
        return $this;
    }

    /**
     * Get horadefin
     *
     * @return \DateTime 
     */
    public function getHoradefin()
    {
        return $this->horadefin;
    }

    /**
     * Set autoridad
     *
     * @param string $autoridad
     * @return Detallecompensatorio
     */
    public function setAutoridad($autoridad)
    {
        $this->autoridad = $autoridad;
    
        return $this;
    }

    /**
     * Get autoridad
     *
     * @return string 
     */
    public function getAutoridad()
    {
        return $this->autoridad;
    }
}