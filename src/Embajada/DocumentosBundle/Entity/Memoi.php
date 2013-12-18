<?php

namespace Embajada\DocumentosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Memoi
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Memoi
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
     * @ORM\Column(name="numerodememo", type="integer")
     */
    private $numerodememo;

    /**
     * @var string
     *
     * @ORM\Column(name="remitente", type="string", length=255)
     */
    private $remitente;

    /**
     * @var string
     *
     * @ORM\Column(name="destinatario", type="string", length=255)
     */
    private $destinatario;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date")
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
     * @ORM\Column(name="cuerpo", type="text")
     */
    private $cuerpo;

    /**
     * @var integer
     *
     * @ORM\Column(name="aprobado", type="integer")
     */
    private $aprobado;

    /**
     * @var string
     *
     * @ORM\Column(name="clasificacion", type="string", length=255)
     */
    private $clasificacion;

    /**
     * @var string
     *
     * @ORM\Column(name="asunto", type="string", length=255)
     */
    private $asunto;

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
     * Set numerodememo
     *
     * @param integer $numerodememo
     * @return Memoi
     */
    public function setNumerodememo($numerodememo)
    {
        $this->numerodememo = $numerodememo;

        return $this;
    }

    /**
     * Get numerodememo
     *
     * @return integer 
     */
    public function getNumerodememo()
    {
        return $this->numerodememo;
    }

    /**
     * Set remitente
     *
     * @param string $remitente
     * @return Memoi
     */
    public function setRemitente($remitente)
    {
        $this->remitente = $remitente;

        return $this;
    }

    /**
     * Get remitente
     *
     * @return string 
     */
    public function getRemitente()
    {
        return $this->remitente;
    }

    /**
     * Set destinatario
     *
     * @param string $destinatario
     * @return Memoi
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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Memoi
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
     * @return Memoi
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
     * Set cuerpo
     *
     * @param string $cuerpo
     * @return Memoi
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
     * Set aprobado
     *
     * @param integer $aprobado
     * @return Memoi
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
     * Set clasificacion
     *
     * @param string $clasificacion
     * @return Memoi
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

}
