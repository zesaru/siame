<?php

namespace Embajada\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Bien
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Bien
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
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="mision", type="string", length=255)
     */
    private $mision;

    /**
     * @var string
     *
     * @ORM\Column(name="doc", type="string", length=255)
     */
    private $doc;

    /**
     * @var string
     *
     * @ORM\Column(name="numerodoc", type="string", length=255)
     */
    private $numerodoc;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;

    /**
     * @var float
     *
     * @ORM\Column(name="valor", type="decimal")
     */
    private $valor;

    /**
     * @var string
     *
     * @ORM\Column(name="marca", type="string", length=255)
     */
    private $marca;

    /**
     * @var string
     *
     * @ORM\Column(name="modelo", type="string", length=255)
     */
    private $modelo;

    /**
     * @var string
     *
     * @ORM\Column(name="serie", type="string", length=255)
     */
    private $serie;

    /**
     * @var string
     *
     * @ORM\Column(name="medida", type="string", length=255)
     */
    private $medida;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=255)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="situacionregistro", type="string", length=255)
     */
    private $situacionregistro;

    /**
     * @var string
     *
     * @ORM\Column(name="estadoanterior", type="string", length=255)
     */
    private $estadoanterior;

    /**
     * @var string
     *
     * @ORM\Column(name="ubicacion", type="string", length=255)
     */
    private $ubicacion;

    /**
     * @var string
     *
     * @ORM\Column(name="codigomision", type="string", length=255)
     */
    private $codigomision;

    /**
     * @var string
     *
     * @ORM\Column(name="codigopatrimonial", type="string", length=255)
     */
    private $codigopatrimonial;

    /**
     * @var string
     *
     * @ORM\Column(name="fotografias", type="text")
     *
     * @Assert\Image(maxSize = "5000k")
     */
    private $fotografias;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="string", length=255)
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Bien
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
     * Set mision
     *
     * @param string $mision
     * @return Bien
     */
    public function setMision($mision)
    {
        $this->mision = $mision;
    
        return $this;
    }

    /**
     * Get mision
     *
     * @return string 
     */
    public function getMision()
    {
        return $this->mision;
    }

    /**
     * Set doc
     *
     * @param string $doc
     * @return Bien
     */
    public function setDoc($doc)
    {
        $this->doc = $doc;
    
        return $this;
    }

    /**
     * Get doc
     *
     * @return string 
     */
    public function getDoc()
    {
        return $this->doc;
    }

    /**
     * Set numerodoc
     *
     * @param string $numerodoc
     * @return Bien
     */
    public function setNumerodoc($numerodoc)
    {
        $this->numerodoc = $numerodoc;
    
        return $this;
    }

    /**
     * Get numerodoc
     *
     * @return string 
     */
    public function getNumerodoc()
    {
        return $this->numerodoc;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Bien
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
     * Set valor
     *
     * @param float $valor
     * @return Bien
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    
        return $this;
    }

    /**
     * Get valor
     *
     * @return float 
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set marca
     *
     * @param string $marca
     * @return Bien
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;
    
        return $this;
    }

    /**
     * Get marca
     *
     * @return string 
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     * @return Bien
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    
        return $this;
    }

    /**
     * Get modelo
     *
     * @return string 
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set serie
     *
     * @param string $serie
     * @return Bien
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;
    
        return $this;
    }

    /**
     * Get serie
     *
     * @return string 
     */
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * Set medida
     *
     * @param string $medida
     * @return Bien
     */
    public function setMedida($medida)
    {
        $this->medida = $medida;
    
        return $this;
    }

    /**
     * Get medida
     *
     * @return string 
     */
    public function getMedida()
    {
        return $this->medida;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return Bien
     */
    public function setColor($color)
    {
        $this->color = $color;
    
        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Bien
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set situacionregistro
     *
     * @param string $situacionregistro
     * @return Bien
     */
    public function setSituacionregistro($situacionregistro)
    {
        $this->situacionregistro = $situacionregistro;
    
        return $this;
    }

    /**
     * Get situacionregistro
     *
     * @return string 
     */
    public function getSituacionregistro()
    {
        return $this->situacionregistro;
    }

    /**
     * Set estadoanterior
     *
     * @param string $estadoanterior
     * @return Bien
     */
    public function setEstadoanterior($estadoanterior)
    {
        $this->estadoanterior = $estadoanterior;
    
        return $this;
    }

    /**
     * Get estadoanterior
     *
     * @return string 
     */
    public function getEstadoanterior()
    {
        return $this->estadoanterior;
    }

    /**
     * Set ubicacion
     *
     * @param string $ubicacion
     * @return Bien
     */
    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;
    
        return $this;
    }

    /**
     * Get ubicacion
     *
     * @return string 
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    /**
     * Set codigomision
     *
     * @param string $codigomision
     * @return Bien
     */
    public function setCodigomision($codigomision)
    {
        $this->codigomision = $codigomision;
    
        return $this;
    }

    /**
     * Get codigomision
     *
     * @return string 
     */
    public function getCodigomision()
    {
        return $this->codigomision;
    }

    /**
     * Set codigopatrimonial
     *
     * @param string $codigopatrimonial
     * @return Bien
     */
    public function setCodigopatrimonial($codigopatrimonial)
    {
        $this->codigopatrimonial = $codigopatrimonial;
    
        return $this;
    }

    /**
     * Get codigopatrimonial
     *
     * @return string 
     */
    public function getCodigopatrimonial()
    {
        return $this->codigopatrimonial;
    }

    /**
     * Set fotografias
     *
     * @param string $fotografias
     * @return Bien
     */
    public function setFotografias($fotografias)
    {
        $this->fotografias = $fotografias;
    
        return $this;
    }

    /**
     * Get fotografias
     *
     * @return string 
     */
    public function getFotografias()
    {
        return $this->fotografias;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return Bien
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
