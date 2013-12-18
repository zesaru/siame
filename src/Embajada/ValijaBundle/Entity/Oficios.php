<?php

namespace Embajada\ValijaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Oficios
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Oficios
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
     * @var string
     *
     * @ORM\Column(name="numerodeoficio", type="string", length=255)
     */
    private $numerodeoficio;

    /**
     * @var string
     *
     * @ORM\Column(name="asunto", type="string", length=255)
     */
    private $asunto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="referencia", type="string", length=255)
     */
    private $referencia;

    /**
     * @var string
     *
     * @ORM\Column(name="clasificacion", type="string", length=255)
     */
    private $clasificacion;


    /**
     * @var string
     *
     * @ORM\Column(name="destino", type="string", length=255)
     */
    private $destino;

    /**
     * @var integer
     *
     * @ORM\Column(name="aprobado", type="integer")
     */
    private $aprobado;

    /**
     * @var integer
     *
     * @ORM\Column(name="anexos", type="integer")
     */
    private $anexos;

    /**
     * @var string
     *
     * @ORM\Column(name="cuerpo", type="text")
     */
    private $cuerpo;

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
     * Set numerodeoficio
     *
     * @param string $numerodeoficio
     * @return Oficios
     */
    public function setNumerodeoficio($numerodeoficio)
    {
        $this->numerodeoficio = $numerodeoficio;

        return $this;
    }

    /**
     * Get numerodeoficio
     *
     * @return string 
     */
    public function getNumerodeoficio()
    {
        return $this->numerodeoficio;
    }

    /**
     * Set asunto
     *
     * @param string $asunto
     * @return Oficios
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
     * @return Oficios
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
     * Set referencia
     *
     * @param string $referencia
     * @return Oficios
     */
    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;

        return $this;
    }

    /**
     * Get referencia
     *
     * @return string 
     */
    public function getReferencia()
    {
        return $this->referencia;
    }

    /**
     * Set clasificacion
     *
     * @param string $clasificacion
     * @return Oficios
     */
    public function setClasificacion($clasificacion)
    {
        $this->clasificacion = $clasificacion;

        return $this;
    }

    /**
     * Get clasificacion
     *
     * @return string 
     */
    public function getClasificacion()
    {
        return $this->clasificacion;
    }
    /**
     * Set destino
     *
     * @param string $destino
     * @return Oficios
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
     * Set aprobado
     *
     * @param integer $aprobado
     * @return Oficios
     */
    public function setAprobado($aprobado)
    {
        $this->aprobado = $aprobado;

        return $this;
    }

    /**
     * Get aprobado
     *
     * @return integer 
     */
    public function getAprobado()
    {
        return $this->aprobado;
    }

    /**
     * Set anexos
     *
     * @param integer $anexos
     * @return Oficios
     */
    public function setAnexos($anexos)
    {
        $this->anexos = $anexos;

        return $this;
    }

    /**
     * Get anexos
     *
     * @return integer 
     */
    public function getAnexos()
    {
        return $this->anexos;
    }

    /**
     * Set cuerpo
     *
     * @param string $cuerpo
     * @return Oficios
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
