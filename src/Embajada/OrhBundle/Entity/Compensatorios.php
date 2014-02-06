<?php

namespace Embajada\OrhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Compensatorios
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Embajada\OrhBundle\Entity\CompensatoriosRepository")
 */
class Compensatorios
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
     * @ORM\Column(name="diasdecompensatorio", type="integer")
     */
    private $diasdecompensatorio;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidaddehoras1", type="integer",nullable=true)
     */
    private $cantidaddehoras1;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidaddehoras2", type="integer",nullable=true)
     */
    private $cantidaddehoras2;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidaddehoras3", type="integer",nullable=true)
     */
    private $cantidaddehoras3;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidaddehoras4", type="integer",nullable=true)
     */
    private $cantidaddehoras4;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechadesolicitud", type="datetime")
     */
    private $fechadesolicitud;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechadeaprobado", type="datetime", nullable=true)
     */
    private $fechadeaprobado;

    /**
     * @var integer
     *
     * @ORM\Column(name="estado", type="integer", nullable=true)
     */
    private $estado;

    /**
     * @var integer
     *
     * @ORM\Column(name="estado2", type="integer", nullable=true)
     */
    private $estado2;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="text",nullable=true)
     */
    private $observaciones;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechadeevento1", type="date")
     */
    private $fechadeevento1;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechadeevento2", type="date" , nullable=true)
     */
    private $fechadeevento2;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechadeevento3", type="date" , nullable=true)
     */
    private $fechadeevento3;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechadeevento4", type="date" , nullable=true)
     */
    private $fechadeevento4;

    /**
     * @var string
     *
     * @ORM\Column(name="personaacargo", type="string", length=140)
     */
    private $personaacargo;

    /**
     * @var string
     *
     * @ORM\Column(name="turno1", type="string", length=140,nullable=true)
     */
    private $turno1;

    /**
     * @var string
     *
     * @ORM\Column(name="turno2", type="string", length=140, nullable=true)
     */
    private $turno2;

    /**
     * @var string
     *
     * @ORM\Column(name="turno3", type="string", length=140, nullable=true)
     */
    private $turno3;

    /**
     * @var string
     *
     * @ORM\Column(name="turno4", type="string", length=140, nullable=true)
     */
    private $turno4;


    /**
     * @var string
     *
     * @ORM\Column(name="actividad1", type="string", length=140)
     */
    private $actividad1;

    /**
     * @var string
     *
     * @ORM\Column(name="actividad2", type="string", length=140, nullable=true)
     */
    private $actividad2;

    /**
     * @var string
     *
     * @ORM\Column(name="actividad3", type="string", length=140 , nullable=true)
     */
    private $actividad3;

    /**
     * @var string
     *
     * @ORM\Column(name="actividad4", type="string", length=140 , nullable=true)
     */
    private $actividad4;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horadeinicio", type="time")
     */
    private $horadeinicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horadeinicio2", type="time" , nullable=true)
     */
    private $horadeinicio2;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horadeinicio3", type="time" , nullable=true)
     */
    private $horadeinicio3;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horadeinicio4", type="time" , nullable=true)
     */
    private $horadeinicio4;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horadefin1", type="time")
     */
    private $horadefin1;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horadefin2", type="time" , nullable=true)
     */
    private $horadefin2;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horadefin3", type="time" , nullable=true)
     */
    private $horadefin3;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horadefin4", type="time" , nullable=true)
     */
    private $horadefin4;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidaddia1", type="integer",nullable=true)
     */
    private $cantidaddia1;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidaddia2", type="integer",nullable=true)
     */
    private $cantidaddia2;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidaddia3", type="integer",nullable=true)
     */
    private $cantidaddia3;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidaddia4", type="integer",nullable=true)
     */
    private $cantidaddia4;


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
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="Embajada\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uaprobado", referencedColumnName="id")
     * })
     */
    private $uaprobado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechacompensatorio1", type="date", nullable=true)
     */
    private $fechacompensatorio1;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechacompensatorio2", type="date", nullable=true)
     */
    private $fechacompensatorio2;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechacompensatorio3", type="date", nullable=true)
     */
    private $fechacompensatorio3;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechacompensatorio4", type="date", nullable=true)
     */
    private $fechacompensatorio4;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechadesolicitud2", type="datetime", nullable=true)
     */
    private $fechadesolicitud2;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechadeaprobacion2", type="datetime", nullable=true)
     */
    private $fechadeaprobacion2;

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
     * Set diasdecompensatorio
     *
     * @param integer $diasdecompensatorio
     * @return Compensatorios
     */
    public function setDiasdecompensatorio($diasdecompensatorio)
    {
        $this->diasdecompensatorio = $diasdecompensatorio;

        return $this;
    }

    /**
     * Get diasdecompensatorio
     *
     * @return integer 
     */
    public function getDiasdecompensatorio()
    {
        return $this->diasdecompensatorio;
    }

    /**
     * Set cantidaddehoras1
     *
     * @param integer $cantidaddehoras1
     * @return Compensatorios
     */
    public function setCantidaddehoras1($cantidaddehoras1)
    {
        $this->cantidaddehoras1 = $cantidaddehoras1;

        return $this;
    }

    /**
     * Get cantidaddehoras1
     *
     * @return integer 
     */
    public function getCantidaddehoras1()
    {
        return $this->cantidaddehoras1;
    }

    /**
     * Set cantidaddehoras2
     *
     * @param integer $cantidaddehoras2
     * @return Compensatorios
     */
    public function setCantidaddehoras2($cantidaddehoras2)
    {
        $this->cantidaddehoras2 = $cantidaddehoras2;

        return $this;
    }

    /**
     * Get cantidaddehoras2
     *
     * @return integer 
     */
    public function getCantidaddehoras2()
    {
        return $this->cantidaddehoras2;
    }

    /**
     * Set cantidaddehoras3
     *
     * @param integer $cantidaddehoras3
     * @return Compensatorios
     */
    public function setCantidaddehoras3($cantidaddehoras3)
    {
        $this->cantidaddehoras3 = $cantidaddehoras3;

        return $this;
    }

    /**
     * Get cantidaddehoras3
     *
     * @return integer 
     */
    public function getCantidaddehoras3()
    {
        return $this->cantidaddehoras3;
    }

    /**
     * Set cantidaddehoras4
     *
     * @param integer $cantidaddehoras4
     * @return Compensatorios
     */
    public function setCantidaddehoras4($cantidaddehoras4)
    {
        $this->cantidaddehoras4 = $cantidaddehoras4;

        return $this;
    }

    /**
     * Get cantidaddehoras4
     *
     * @return integer 
     */
    public function getCantidaddehoras4()
    {
        return $this->cantidaddehoras4;
    }
    /**
     * Set fechadesolicitud
     *
     * @param \DateTime $fechadesolicitud
     * @return Compensatorios
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
     * Set fechadesolicitud2
     *
     * @param \DateTime $fechadesolicitud2
     * @return Compensatorios
     */
    public function setFechadesolicitud2($fechadesolicitud2)
    {
        $this->fechadesolicitud2 = $fechadesolicitud2;

        return $this;
    }

    /**
     * Get fechadesolicitud2
     *
     * @return \DateTime 
     */
    public function getFechadesolicitud2()
    {
        return $this->fechadesolicitud2;
    }

    /**
     * Set fechadeaprobado
     *
     * @param \DateTime $fechadeaprobado
     * @return Compensatorios
     */
    public function setFechadeaprobado($fechadeaprobado)
    {
        $this->fechadeaprobado = $fechadeaprobado;

        return $this;
    }

    /**
     * Get fechadeaprobado
     *
     * @return \DateTime 
     */
    public function getFechadeaprobado()
    {
        return $this->fechadeaprobado;
    }

        /**
     * Set fechadeaprobacion2
     *
     * @param \DateTime $fechadeaprobacion2
     * @return Compensatorios
     */
    public function setFechadeaprobacion2($fechadeaprobacion2)
    {
        $this->fechadeaprobacion2 = $fechadeaprobacion2;

        return $this;
    }

    /**
     * Get fechadeaprobacion2
     *
     * @return \DateTime 
     */
    public function getFechadeaprobacion2()
    {
        return $this->fechadeaprobacion2;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return Compensatorios
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return integer 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set estado2
     *
     * @param integer $estado2
     * @return Compensatorios
     */
    public function setEstado2($estado2)
    {
        $this->estado2 = $estado2;

        return $this;
    }

    /**
     * Get estado2
     *
     * @return integer 
     */
    public function getEstado2()
    {
        return $this->estado2;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return Compensatorios
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
     * Set fechadeevento1
     *
     * @param \DateTime $fechadeevento1
     * @return Compensatorios
     */
    public function setFechadeevento1($fechadeevento1)
    {
        $this->fechadeevento1 = $fechadeevento1;

        return $this;
    }

    /**
     * Get fechadeevento1
     *
     * @return \DateTime 
     */
    public function getFechadeevento1()
    {
        return $this->fechadeevento1;
    }

    /**
     * Set fechadeevento2
     *
     * @param \DateTime $fechadeevento2
     * @return Compensatorios
     */
    public function setFechadeevento2($fechadeevento2)
    {
        $this->fechadeevento2 = $fechadeevento2;

        return $this;
    }

    /**
     * Get fechadeevento2
     *
     * @return \DateTime 
     */
    public function getFechadeevento2()
    {
        return $this->fechadeevento2;
    }

    /**
     * Set fechadeevento3
     *
     * @param \DateTime $fechadeevento3
     * @return Compensatorios
     */
    public function setFechadeevento3($fechadeevento3)
    {
        $this->fechadeevento3 = $fechadeevento3;

        return $this;
    }

    /**
     * Get fechadeevento3
     *
     * @return \DateTime 
     */
    public function getFechadeevento3()
    {
        return $this->fechadeevento3;
    }

    /**
     * Set fechadeevento4
     *
     * @param \DateTime $fechadeevento4
     * @return Compensatorios
     */
    public function setFechadeevento4($fechadeevento4)
    {
        $this->fechadeevento4 = $fechadeevento4;

        return $this;
    }

    /**
     * Get fechadeevento4
     *
     * @return \DateTime 
     */
    public function getFechadeevento4()
    {
        return $this->fechadeevento4;
    }

    /**
     * Set personaacargo
     *
     * @param string $personaacargo
     * @return Compensatorios
     */
    public function setPersonaacargo($personaacargo)
    {
        $this->personaacargo = $personaacargo;

        return $this;
    }

    /**
     * Get personaacargo
     *
     * @return string 
     */
    public function getPersonaacargo()
    {
        return $this->personaacargo;
    }

    /**
     * Set turno1
     *
     * @param string $turno1
     * @return Compensatorios
     */
    public function setTurno1($turno1)
    {
        $this->turno1 = $turno1;

        return $this;
    }

    /**
     * Get turno1
     *
     * @return string 
     */
    public function getTurno1()
    {
        return $this->turno1;
    }

    /**
     * Set turno2
     *
     * @param string $turno2
     * @return Compensatorios
     */
    public function setTurno2($turno2)
    {
        $this->turno2 = $turno2;

        return $this;
    }

    /**
     * Get turno2
     *
     * @return string 
     */
    public function getTurno2()
    {
        return $this->turno2;
    }

    /**
     * Set turno3
     *
     * @param string $turno3
     * @return Compensatorios
     */
    public function setTurno3($turno3)
    {
        $this->turno3 = $turno3;

        return $this;
    }

    /**
     * Get turno3
     *
     * @return string 
     */
    public function getTurno3()
    {
        return $this->turno3;
    }

    /**
     * Set turno4
     *
     * @param string $turno4
     * @return Compensatorios
     */
    public function setTurno4($turno4)
    {
        $this->turno4 = $turno4;

        return $this;
    }

    /**
     * Get turno4
     *
     * @return string 
     */
    public function getTurno4()
    {
        return $this->turno4;
    }

    /**
     * Set actividad1
     *
     * @param string $actividad1
     * @return Compensatorios
     */
    public function setActividad1($actividad1)
    {
        $this->actividad1 = $actividad1;

        return $this;
    }

    /**
     * Get actividad1
     *
     * @return string 
     */
    public function getActividad1()
    {
        return $this->actividad1;
    }

    /**
     * Set actividad2
     *
     * @param string $actividad2
     * @return Compensatorios
     */
    public function setActividad2($actividad2)
    {
        $this->actividad2 = $actividad2;

        return $this;
    }

    /**
     * Get actividad2
     *
     * @return string 
     */
    public function getActividad2()
    {
        return $this->actividad2;
    }

    /**
     * Set actividad3
     *
     * @param string $actividad3
     * @return Compensatorios
     */
    public function setActividad3($actividad3)
    {
        $this->actividad3 = $actividad3;

        return $this;
    }

    /**
     * Get actividad3
     *
     * @return string 
     */
    public function getActividad3()
    {
        return $this->actividad3;
    }

    /**
     * Set actividad4
     *
     * @param string $actividad4
     * @return Compensatorios
     */
    public function setActividad4($actividad4)
    {
        $this->actividad4 = $actividad4;

        return $this;
    }

    /**
     * Get actividad4
     *
     * @return string 
     */
    public function getActividad4()
    {
        return $this->actividad4;
    }

    /**
     * Set horadeinicio
     *
     * @param \DateTime $horadeinicio
     * @return Compensatorios
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
     * Set horadeinicio2
     *
     * @param \DateTime $horadeinicio2
     * @return Compensatorios
     */
    public function setHoradeinicio2($horadeinicio2)
    {
        $this->horadeinicio2 = $horadeinicio2;

        return $this;
    }

    /**
     * Get horadeinicio2
     *
     * @return \DateTime 
     */
    public function getHoradeinicio2()
    {
        return $this->horadeinicio2;
    }

    /**
     * Set horadeinicio3
     *
     * @param \DateTime $horadeinicio3
     * @return Compensatorios
     */
    public function setHoradeinicio3($horadeinicio3)
    {
        $this->horadeinicio3 = $horadeinicio3;

        return $this;
    }

    /**
     * Get horadeinicio3
     *
     * @return \DateTime 
     */
    public function getHoradeinicio3()
    {
        return $this->horadeinicio3;
    }

    /**
     * Set horadeinicio4
     *
     * @param \DateTime $horadeinicio4
     * @return Compensatorios
     */
    public function setHoradeinicio4($horadeinicio4)
    {
        $this->horadeinicio4 = $horadeinicio4;

        return $this;
    }

    /**
     * Get horadeinicio4
     *
     * @return \DateTime 
     */
    public function getHoradeinicio4()
    {
        return $this->horadeinicio4;
    }

    /**
     * Set horadefin1
     *
     * @param \DateTime $horadefin1
     * @return Compensatorios
     */
    public function setHoradefin1($horadefin1)
    {
        $this->horadefin1 = $horadefin1;

        return $this;
    }

    /**
     * Get horadefin1
     *
     * @return \DateTime 
     */
    public function getHoradefin1()
    {
        return $this->horadefin1;
    }

    /**
     * Set horadefin2
     *
     * @param \DateTime $horadefin2
     * @return Compensatorios
     */
    public function setHoradefin2($horadefin2)
    {
        $this->horadefin2 = $horadefin2;

        return $this;
    }

    /**
     * Get horadefin2
     *
     * @return \DateTime 
     */
    public function getHoradefin2()
    {
        return $this->horadefin2;
    }

    /**
     * Set horadefin3
     *
     * @param \DateTime $horadefin3
     * @return Compensatorios
     */
    public function setHoradefin3($horadefin3)
    {
        $this->horadefin3 = $horadefin3;

        return $this;
    }

    /**
     * Get horadefin3
     *
     * @return \DateTime 
     */
    public function getHoradefin3()
    {
        return $this->horadefin3;
    }

    /**
     * Set horadefin4
     *
     * @param \DateTime $horadefin4
     * @return Compensatorios
     */
    public function setHoradefin4($horadefin4)
    {
        $this->horadefin4 = $horadefin4;

        return $this;
    }

    /**
     * Get horadefin4
     *
     * @return \DateTime 
     */
    public function getHoradefin4()
    {
        return $this->horadefin4;
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
    /**
     * Set uaprobado
     *
     * @param \Embajada\UserBundle\Entity\User $uaprobado
     * @return Notascd
     */
    public function setUaprobado(\Embajada\UserBundle\Entity\User $uaprobado = null)
    {
        $this->uaprobado = $uaprobado;
    
        return $this;
    }

    /**
     * Get uaprobado
     *
     * @return \Embajada\UserBundle\Entity\User 
     */
    public function getUaprobado()
    {
        return $this->uaprobado;
    }

    /**
     * Set cantidaddia1
     *
     * @param integer $cantidaddia1
     * @return Compensatorios
     */
    public function setCantidaddia1($cantidaddia1)
    {
        $this->cantidaddia1 = $cantidaddia1;

        return $this;
    }

    /**
     * Get cantidaddia1
     *
     * @return integer 
     */
    public function getCantidaddia1()
    {
        return $this->cantidaddia1;
    }

    /**
     * Set cantidaddia2
     *
     * @param integer $cantidaddia2
     * @return Compensatorios
     */
    public function setCantidaddia2($cantidaddia2)
    {
        $this->cantidaddia2 = $cantidaddia2;

        return $this;
    }

    /**
     * Get cantidadia2
     *
     * @return integer 
     */
    public function getCantidaddia2()
    {
        return $this->cantidaddia2;
    }

    /**
     * Set cantidaddia3
     *
     * @param integer $cantidaddia3
     * @return Compensatorios
     */
    public function setCantidaddia3($cantidaddia3)
    {
        $this->cantidaddia = $cantidaddia3;

        return $this;
    }

    /**
     * Get cantidaddia3
     *
     * @return integer 
     */
    public function getCantidaddia3()
    {
        return $this->cantidaddia3;
    }

    /**
     * Set cantidaddia4
     *
     * @param integer $cantidaddia4
     * @return Compensatorios
     */
    public function setCantidaddia4($cantidaddia4)
    {
        $this->cantidaddia4 = $cantidaddia4;

        return $this;
    }

    /**
     * Get cantidaddia4
     *
     * @return integer 
     */
    public function getCantidaddia4()
    {
        return $this->cantidaddia4;
    }

    /**
     * Set fechacompensatorio1
     *
     * @param \DateTime $fechacompensatorio1
     * @return Compensatorios
     */
    public function setFechacompensatorio1($fechacompensatorio1)
    {
        $this->fechacompensatorio1 = $fechacompensatorio1;

        return $this;
    }

    /**
     * Get fechacompensatorio1
     *
     * @return \DateTime 
     */
    public function getFechacompensatorio1()
    {
        return $this->fechacompensatorio1;
    }

   /**
     * Set fechacompensatorio2
     *
     * @param \DateTime $fechacompensatorio2
     * @return Compensatorios
     */
    public function setFechacompensatorio2($fechacompensatorio2)
    {
        $this->fechacompensatorio2 = $fechacompensatorio2;

        return $this;
    }

    /**
     * Get fechacompensatorio2
     *
     * @return \DateTime 
     */
    public function getFechacompensatorio2()
    {
        return $this->fechacompensatorio2;
    }

   /**
     * Set fechacompensatorio3
     *
     * @param \DateTime $fechacompensatorio3
     * @return Compensatorios
     */
    public function setFechacompensatorio3($fechacompensatorio3)
    {
        $this->fechacompensatorio3 = $fechacompensatorio3;

        return $this;
    }

    /**
     * Get fechacompensatorio3
     *
     * @return \DateTime 
     */
    public function getFechacompensatorio3()
    {
        return $this->fechacompensatorio3;
    }  

    /**
     * Set fechacompensatorio4
     *
     * @param \DateTime $fechacompensatorio4
     * @return Compensatorios
     */
    public function setFechacompensatorio4($fechacompensatorio4)
    {
        $this->fechacompensatorio4 = $fechacompensatorio4;

        return $this;
    }

    /**
     * Get fechacompensatorio4
     *
     * @return \DateTime 
     */
    public function getFechacompensatorio4()
    {
        return $this->fechacompensatorio4;
    }   
}
