<?php

namespace Embajada\ValijaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hremision
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Hremision
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
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer")
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="destino", type="string", length=140)
     */
    private $destino;

    /**
     * @var string
     *
     * @ORM\Column(name="asunto", type="string", length=140)
     */
    private $asunto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="ferencia", type="string", length=255)
     */
    private $ferencia;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="sumilla", type="text")
     */
    private $sumilla;

    /**
     * @var string
     *
     * @ORM\Column(name="origen", type="text")
     */
    private $origen;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="text")
     */
    private $observaciones;

    /**
     * @var integer
     *
     * @ORM\Column(name="numerodevalija", type="integer")
     */
    private $numerodevalija;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=140)
     */
    private $direccion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean")
     */
    private $estado;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     * @return Hremision
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    
        return $this;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set destino
     *
     * @param string $destino
     * @return Hremision
     */
    public function setDestino($destino)
    {
        $this->destino = $destino;
    
        return $this;
    }

    /**
     * Get destino
     *
     * @return string 
     */
    public function getDestino()
    {
        return $this->destino;
    }

    /**
     * Set asunto
     *
     * @param string $asunto
     * @return Hremision
     */
    public function setAsunto($asunto)
    {
        $this->asunto = $asunto;
    
        return $this;
    }

    /**
     * Get asunto
     *
     * @return string 
     */
    public function getAsunto()
    {
        return $this->asunto;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Hremision
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
     * Set ferencia
     *
     * @param string $ferencia
     * @return Hremision
     */
    public function setFerencia($ferencia)
    {
        $this->ferencia = $ferencia;
    
        return $this;
    }

    /**
     * Get ferencia
     *
     * @return string 
     */
    public function getFerencia()
    {
        return $this->ferencia;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Hremision
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set sumilla
     *
     * @param string $sumilla
     * @return Hremision
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
     * Set origen
     *
     * @param string $origen
     * @return Hremision
     */
    public function setOrigen($origen)
    {
        $this->origen = $origen;
    
        return $this;
    }

    /**
     * Get origen
     *
     * @return string 
     */
    public function getOrigen()
    {
        return $this->origen;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return Hremision
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
     * Set numerodevalija
     *
     * @param integer $numerodevalija
     * @return Hremision
     */
    public function setNumerodevalija($numerodevalija)
    {
        $this->numerodevalija = $numerodevalija;
    
        return $this;
    }

    /**
     * Get numerodevalija
     *
     * @return integer 
     */
    public function getNumerodevalija()
    {
        return $this->numerodevalija;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Hremision
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    
        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return Hremision
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return boolean 
     */
    public function getEstado()
    {
        return $this->estado;
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
