<?php
// src/Embajada/UserBundle/Entity/User.php

namespace Embajada\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Please enter your name.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max="255",
     *     minMessage="The name is too short.",
     *     maxMessage="The name is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="POr favor ingrese su apellido.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max="255",
     *     minMessage="Tu Apellido es muy corto.",
     *     maxMessage="Tu Apellido es muy largo.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $apellidos;

    /**
     * @ORM\Column(type="date")
     *
     * @Assert\NotBlank(message="Por favor ingrese su fechadeingreso.", groups={"Registration", "Profile"})
     */
    protected $fechadeingreso;

    /**
     * @ORM\Column(type="integer")
     *
     * @Assert\NotBlank(message="Por favor ingrese su numero de vacaciones.", groups={"Registration", "Profile"})
     */

    protected $numerodediasdevacaciones;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
   /**
     * Set name
     *
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
   /**
     * Set apellidos
     *
     * @param string $apellidos
     * @return User
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
     * Set fechadeingreso
     *
     * @param \DateTime $fechadeingreso
     * @return User
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
     * Set numerodediasdevacaciones
     *
     * @param integer $numerodediasdevacaciones
     * @return User
     */
    public function setNumerodediasdevacaciones($numerodediasdevacaciones)
    {
        $this->numerodediasdevacaciones = $numerodediasdevacaciones;
    
        return $this;
    }

    /**
     * Get numerodediasdevacaciones
     *
     * @return integer 
     */
    public function getNumerodediasdevacaciones()
    {
        return $this->numerodediasdevacaciones;
    }
}
