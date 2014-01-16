<?php

namespace Embajada\ValijaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Otros
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Embajada\ValijaBundle\Entity\OtrosRepository")
 */
class Otros
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
     * @ORM\Column(name="destinatario", type="string", length=255)
     */
    private $destinatario;

    /**
     * @var string
     *
     * @ORM\Column(name="contenido", type="text")
     */
    private $contenido;

    /**
     * @var string
     *
     * @ORM\Column(name="remitente", type="string", length=255)
     */
    private $remitente;

    /**
     * @var string
     *
     * @ORM\Column(name="peso", type="decimal", scale=3, nullable=true)
     */
    private $peso;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean", nullable=true)
     */
    private $estado;

    /** @ORM\ManyToOne(targetEntity="Embajada\ValijaBundle\Entity\Valija") */
    private $valija;

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
     * Set destinatario
     *
     * @param string $destinatario
     * @return Otros
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
     * Set contenido
     *
     * @param string $contenido
     * @return Otros
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;

        return $this;
    }

    /**
     * Get contenido
     *
     * @return string 
     */
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * Set remitente
     *
     * @param string $remitente
     * @return Otros
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
     * Set peso
     *
     * @param string $peso
     * @return Otros
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;

        return $this;
    }

    /**
     * Get peso
     *
     * @return string 
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Otros
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
     * Set estado
     *
     * @param boolean $estado
     * @return Otros
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

    public function setValija(\Embajada\ValijaBundle\Entity\Valija $valija)
    {
        $this->valija = $valija;
    
        return $this;
    }

    /**
     * Get valija
     *
     * @return integer 
     */
    public function getValija()
    {
        return $this->valija;
    }
}
