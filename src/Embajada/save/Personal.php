<?php

namespace Embajada\OrhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Personal
 *
 * @ORM\Table(name="personal")
 * @ORM\Entity
 */
class Personal
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
     * @var string
     *
     * @ORM\Column(name="nombres", type="string", length=255, nullable=true)
     */
    private $nombres;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=255, nullable=true)
     */
    private $apellidos;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechadenacimiento", type="date", nullable=true)
     */
    private $fechadenacimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=255, nullable=true)
     */
    private $direccion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechadeingreso", type="date", nullable=true)
     */
    private $fechadeingreso;

    /**
     * @ORM\ManyToOne(targetEntity="Embajada\UserBundle\Entity\User")
     */
    private $iduser;



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
     * Set nombres
     *
     * @param string $nombres
     * @return Personal
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    
        return $this;
    }

    /**
     * Get nombres
     *
     * @return string 
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     * @return Personal
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    
        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set fechadenacimiento
     *
     * @param \DateTime $fechadenacimiento
     * @return Personal
     */
    public function setFechadenacimiento($fechadenacimiento)
    {
        $this->fechadenacimiento = $fechadenacimiento;
    
        return $this;
    }

    /**
     * Get fechadenacimiento
     *
     * @return \DateTime 
     */
    public function getFechadenacimiento()
    {
        return $this->fechadenacimiento;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Personal
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
     * Set fechadeingreso
     *
     * @param \DateTime $fechadeingreso
     * @return Personal
     */
    public function setFechadeingreso($fechadeingreso)
    {
        $this->fechadeingreso = $fechadeingreso;
    
        return $this;
    }

    /**
     * Get fechadeingreso
     *
     * @return \DateTime 
     */
    public function getFechadeingreso()
    {
        return $this->fechadeingreso;
    }

    /**
     * Set iduser
     *
     * @param \Embajada\OrhBundle\Entity\FosUser $iduser
     * @return Personal
     */
    public function setIduser(\Embajada\OrhBundle\Entity\FosUser $iduser = null)
    {
        $this->iduser = $iduser;
    
        return $this;
    }

    /**
     * Get iduser
     *
     * @return \Embajada\OrhBundle\Entity\FosUser 
     */
    public function getIduser()
    {
        return $this->iduser;
    }
}