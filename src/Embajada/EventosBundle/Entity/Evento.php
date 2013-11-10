<?php

namespace Embajada\EventosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evento
 *
 * @ORM\Table(name="Evento")
 * @ORM\Entity(repositoryClass="Embajada\EventosBundle\Entity\EventoRepository")
 */
class Evento
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
     * @var \Contacto
     *
     * @ORM\ManyToOne(targetEntity="Contacto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contacto_id", referencedColumnName="id")
     * })
     */
    private $contacto;

    /**
     * @var string
     *
     * @ORM\Column(name="vocativo", type="string", length=255)
     */
    private $vocativo;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horadeinvitacion", type="time")
     */
    private $horadeinvitacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechalainvitacion", type="datetime")
     */
    private $fechalainvitacion;


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
     * Set vocativo
     *
     * @param string $vocativo
     * @return Evento
     */
    public function setVocativo($vocativo)
    {
        $this->vocativo = $vocativo;
    
        return $this;
    }

    /**
     * Get vocativo
     *
     * @return string 
     */
    public function getVocativo()
    {
        return $this->vocativo;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     * @return Evento
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
     * Set horadeinvitacion
     *
     * @param \DateTime $horadeinvitacion
     * @return Evento
     */
    public function setHoradeinvitacion($horadeinvitacion)
    {
        $this->horadeinvitacion = $horadeinvitacion;
    
        return $this;
    }

    /**
     * Get horadeinvitacion
     *
     * @return \DateTime 
     */
    public function getHoradeinvitacion()
    {
        return $this->horadeinvitacion;
    }

    /**
     * Set fechalainvitacion
     *
     * @param \DateTime $fechalainvitacion
     * @return Evento
     */
    public function setFechalainvitacion($fechalainvitacion)
    {
        $this->fechalainvitacion = $fechalainvitacion;
    
        return $this;
    }

    /**
     * Get fechalainvitacion
     *
     * @return \DateTime 
     */
    public function getFechalainvitacion()
    {
        return $this->fechalainvitacion;
    }

    /**
     * Set contacto
     *
     * @param \Embajada\EventosBundle\Entity\Contacto $contacto
     * @return Evento
     */
    public function setContacto(\Embajada\EventosBundle\Entity\Contacto $contacto = null)
    {
        $this->contacto = $contacto;
    
        return $this;
    }

    /**
     * Get contacto
     *
     * @return \Embajada\EventosBundle\Entity\Contacto 
     */
    public function getContacto()
    {
        return $this->contacto;
    }
}