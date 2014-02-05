<?php

namespace Embajada\NotasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notas
 *
 * @ORM\Table(name="Notas")
 * @ORM\Entity(repositoryClass="Embajada\NotasBundle\Entity\NotasRepository")
 */
class Notas
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
     * @var integer
     *
     * @ORM\Column(name="numerodenota", type="integer", nullable=true)
     */
    private $numerodenota;

    /**
     * @var string
     *
     * @ORM\Column(name="cuerpo", type="text", nullable=false)
     */
    private $cuerpo;

    /**
     * @var string
     *
     * @ORM\Column(name="sumilla", type="string", length=255, nullable=false)
     */
    private $sumilla;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=false)
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="idioma", type="string", length=2, nullable=false)
     */
    private $idioma;

    /**
     * @var string
     *
     * @ORM\Column(name="destinatario", type="text", nullable=false)
     */
    private $destinatario;

    /**
     * @var boolean
     *
     * @ORM\Column(name="aprobado", type="boolean", nullable=true)
     */
    private $aprobado;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="text", nullable=true)
     */
    private $observaciones;



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
     * Set numerodenota
     *
     * @param integer $numerodenota
     * @return Notas
     */
    public function setNumerodenota($numerodenota)
    {
        $this->numerodenota = $numerodenota;
    
        return $this;
    }

    /**
     * Get numerodenota
     *
     * @return integer 
     */
    public function getNumerodenota()
    {
        return $this->numerodenota;
    }

    /**
     * Set cuerpo
     *
     * @param string $cuerpo
     * @return Notas
     */
    public function setCuerpo($cuerpo)
    {
        $this->cuerpo = $cuerpo;
    
        return $this;
    }

    /**
     * Get cuerpo
     *
     * @return string 
     */
    public function getCuerpo()
    {
        return $this->cuerpo;
    }

    /**
     * Set sumilla
     *
     * @param string $sumilla
     * @return Notas
     */
    public function setSumilla($sumilla)
    {
        $this->sumilla = $sumilla;
    
        return $this;
    }

    /**
     * Get sumilla
     *
     * @return string 
     */
    public function getSumilla()
    {
        return $this->sumilla;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Notas
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    
        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set idioma
     *
     * @param string $idioma
     * @return Notas
     */
    public function setIdioma($idioma)
    {
        $this->idioma = $idioma;
    
        return $this;
    }

    /**
     * Get idioma
     *
     * @return string 
     */
    public function getIdioma()
    {
        return $this->idioma;
    }

    /**
     * Set destinatario
     *
     * @param string $destinatario
     * @return Notas
     */
    public function setDestinatario($destinatario)
    {
        $this->destinatario = $destinatario;
    
        return $this;
    }

    /**
     * Get destinatario
     *
     * @return string 
     */
    public function getDestinatario()
    {
        return $this->destinatario;
    }

    /**
     * Set aprobado
     *
     * @param boolean $aprobado
     * @return Notas
     */
    public function setAprobado($aprobado)
    {
        $this->aprobado = $aprobado;
    
        return $this;
    }

    /**
     * Get aprobado
     *
     * @return boolean 
     */
    public function getAprobado()
    {
        return $this->aprobado;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return Notas
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
}