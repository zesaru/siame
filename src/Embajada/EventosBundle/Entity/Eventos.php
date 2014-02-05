<?php

namespace Embajada\EventosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Eventos
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Embajada\EventosBundle\Entity\EventosRepository")
 */
class Eventos
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
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="lugar", type="string", length=255)
     */
    private $lugar;

    /**
     * @var string
     *
     * @ORM\Column(name="funcionarioencargado", type="string", length=255, nullable=true)
     */
    private $funcionarioencargado;

    /**
     * @var integer
     *
     * @ORM\Column(name="numerodeasistentes", type="integer", nullable=true)
     */
    private $numerodeasistentes;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora", type="time")
     */
    private $hora;

    /**
     * @var string
     *
     * @ORM\Column(name="epli", type="string", length=255)
     */
    private $epli;

    /**
     * @var string
     *
     * @ORM\Column(name="eiti", type="string", length=255)
     */
    private $eiti;

    /**
     * @var string
     *
     * @ORM\Column(name="ecyi", type="string", length=255)
     */
    private $ecyi;

    /**
     * @var string
     *
     * @ORM\Column(name="err", type="string", length=255)
     */
    private $err;

    /**
     * @var string
     *
     * @ORM\Column(name="pfuncionarios", type="string", length=255)
     */
    private $pfuncionarios;

    /**
     * @var string
     *
     * @ORM\Column(name="padministrativos", type="string", length=255, nullable=true)
     */
    private $padministrativos;

    /**
     * @var string
     *
     * @ORM\Column(name="tipodeusoauditorio", type="string", length=255)
     */
    private $tipodeusoauditorio;

    /**
     * @var integer
     *
     * @ORM\Column(name="numerodesillas", type="integer")
     */
    private $numerodesillas;

    /**
     * @var integer
     *
     * @ORM\Column(name="numerodemesas", type="integer")
     */
    private $numerodemesas;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=255)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="mozos", type="string", length=255, nullable=true)
     */
    private $mozos;

    /**
     * @var string
     *
     * @ORM\Column(name="otrosmozos", type="string", length=255, nullable=true)
     */
    private $otrosmozos;

    /**
     * @var string
     *
     * @ORM\Column(name="empresasdemozos", type="string", length=255, nullable=true)
     */
    private $empresasdemozos;

    /**
     * @var string
     *
     * @ORM\Column(name="nombrepersonaldeapoyo", type="string", length=255, nullable=true)
     */
    private $nombrepersonaldeapoyo;


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
     * Set nombre
     *
     * @param string $nombre
     * @return Eventos
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set lugar
     *
     * @param string $lugar
     * @return Eventos
     */
    public function setLugar($lugar)
    {
        $this->lugar = $lugar;

        return $this;
    }

    /**
     * Get lugar
     *
     * @return string 
     */
    public function getLugar()
    {
        return $this->lugar;
    }

    /**
     * Set funcionarioencargado
     *
     * @param string $funcionarioencargado
     * @return Eventos
     */
    public function setFuncionarioencargado($funcionarioencargado)
    {
        $this->funcionarioencargado = $funcionarioencargado;

        return $this;
    }

    /**
     * Get funcionarioencargado
     *
     * @return string 
     */
    public function getFuncionarioencargado()
    {
        return $this->funcionarioencargado;
    }

    /**
     * Set numerodeasistentes
     *
     * @param integer $numerodeasistentes
     * @return Eventos
     */
    public function setNumerodeasistentes($numerodeasistentes)
    {
        $this->numerodeasistentes = $numerodeasistentes;

        return $this;
    }

    /**
     * Get numerodeasistentes
     *
     * @return integer 
     */
    public function getNumerodeasistentes()
    {
        return $this->numerodeasistentes;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Eventos
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
     * Set hora
     *
     * @param \DateTime $hora
     * @return Eventos
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get hora
     *
     * @return \DateTime 
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set epli
     *
     * @param string $epli
     * @return Eventos
     */
    public function setEpli($epli)
    {
        $this->epli = $epli;

        return $this;
    }

    /**
     * Get epli
     *
     * @return string 
     */
    public function getEpli()
    {
        return $this->epli;
    }

    /**
     * Set eiti
     *
     * @param string $eiti
     * @return Eventos
     */
    public function setEiti($eiti)
    {
        $this->eiti = $eiti;

        return $this;
    }

    /**
     * Get eiti
     *
     * @return string 
     */
    public function getEiti()
    {
        return $this->eiti;
    }

    /**
     * Set ecyi
     *
     * @param string $ecyi
     * @return Eventos
     */
    public function setEcyi($ecyi)
    {
        $this->ecyi = $ecyi;

        return $this;
    }

    /**
     * Get ecyi
     *
     * @return string 
     */
    public function getEcyi()
    {
        return $this->ecyi;
    }

    /**
     * Set err
     *
     * @param string $err
     * @return Eventos
     */
    public function setErr($err)
    {
        $this->err = $err;

        return $this;
    }

    /**
     * Get err
     *
     * @return string 
     */
    public function getErr()
    {
        return $this->err;
    }

    /**
     * Set pfuncionarios
     *
     * @param string $pfuncionarios
     * @return Eventos
     */
    public function setPfuncionarios($pfuncionarios)
    {
        $this->pfuncionarios = $pfuncionarios;

        return $this;
    }

    /**
     * Get pfuncionarios
     *
     * @return string 
     */
    public function getPfuncionarios()
    {
        return $this->pfuncionarios;
    }

    /**
     * Set padministrativos
     *
     * @param string $padministrativos
     * @return Eventos
     */
    public function setPadministrativos($padministrativos)
    {
        $this->padministrativos = $padministrativos;

        return $this;
    }

    /**
     * Get padministrativos
     *
     * @return string 
     */
    public function getPadministrativos()
    {
        return $this->padministrativos;
    }

    /**
     * Set tipodeusoauditorio
     *
     * @param string $tipodeusoauditorio
     * @return Eventos
     */
    public function setTipodeusoauditorio($tipodeusoauditorio)
    {
        $this->tipodeusoauditorio = $tipodeusoauditorio;

        return $this;
    }

    /**
     * Get tipodeusoauditorio
     *
     * @return string 
     */
    public function getTipodeusoauditorio()
    {
        return $this->tipodeusoauditorio;
    }

    /**
     * Set numerodesillas
     *
     * @param integer $numerodesillas
     * @return Eventos
     */
    public function setNumerodesillas($numerodesillas)
    {
        $this->numerodesillas = $numerodesillas;

        return $this;
    }

    /**
     * Get numerodesillas
     *
     * @return integer 
     */
    public function getNumerodesillas()
    {
        return $this->numerodesillas;
    }

    /**
     * Set numerodemesas
     *
     * @param integer $numerodemesas
     * @return Eventos
     */
    public function setNumerodemesas($numerodemesas)
    {
        $this->numerodemesas = $numerodemesas;

        return $this;
    }

    /**
     * Get numerodemesas
     *
     * @return integer 
     */
    public function getNumerodemesas()
    {
        return $this->numerodemesas;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return Eventos
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set mozos
     *
     * @param string $mozos
     * @return Eventos
     */
    public function setMozos($mozos)
    {
        $this->mozos = $mozos;

        return $this;
    }

    /**
     * Get mozos
     *
     * @return string 
     */
    public function getMozos()
    {
        return $this->mozos;
    }

    /**
     * Set otrosmozos
     *
     * @param string $otrosmozos
     * @return Eventos
     */
    public function setOtrosmozos($otrosmozos)
    {
        $this->otrosmozos = $otrosmozos;

        return $this;
    }

    /**
     * Get otrosmozos
     *
     * @return string 
     */
    public function getOtrosmozos()
    {
        return $this->otrosmozos;
    }

    /**
     * Set empresasdemozos
     *
     * @param string $empresasdemozos
     * @return Eventos
     */
    public function setEmpresasdemozos($empresasdemozos)
    {
        $this->empresasdemozos = $empresasdemozos;

        return $this;
    }

    /**
     * Get empresasdemozos
     *
     * @return string 
     */
    public function getEmpresasdemozos()
    {
        return $this->empresasdemozos;
    }

    /**
     * Set nombrepersonaldeapoyo
     *
     * @param string $nombrepersonaldeapoyo
     * @return Eventos
     */
    public function setNombrepersonaldeapoyo($nombrepersonaldeapoyo)
    {
        $this->nombrepersonaldeapoyo = $nombrepersonaldeapoyo;

        return $this;
    }

    /**
     * Get nombrepersonaldeapoyo
     *
     * @return string 
     */
    public function getNombrepersonaldeapoyo()
    {
        return $this->nombrepersonaldeapoyo;
    }
}
