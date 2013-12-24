<?php

namespace Embajada\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Libros
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Libros
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
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="volumen", type="string", length=255)
     */
    private $volumen;

    /**
     * @var string
     *
     * @ORM\Column(name="tomo", type="string", length=255)
     */
    private $tomo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechadepublicacion", type="date")
     */
    private $fechadepublicacion;

    /**
     * @var string
     *
     * @ORM\Column(name="autor", type="string", length=255)
     */
    private $autor;

    /**
     * @var string
     *
     * @ORM\Column(name="ubicacion", type="string", length=255)
     */
    private $ubicacion;


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
     * Set titulo
     *
     * @param string $titulo
     * @return Libros
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set volumen
     *
     * @param string $volumen
     * @return Libros
     */
    public function setVolumen($volumen)
    {
        $this->volumen = $volumen;

        return $this;
    }

    /**
     * Get volumen
     *
     * @return string 
     */
    public function getVolumen()
    {
        return $this->volumen;
    }

    /**
     * Set tomo
     *
     * @param string $tomo
     * @return Libros
     */
    public function setTomo($tomo)
    {
        $this->tomo = $tomo;

        return $this;
    }

    /**
     * Get tomo
     *
     * @return string 
     */
    public function getTomo()
    {
        return $this->tomo;
    }

    /**
     * Set fechadepublicacion
     *
     * @param \DateTime $fechadepublicacion
     * @return Libros
     */
    public function setFechadepublicacion($fechadepublicacion)
    {
        $this->fechadepublicacion = $fechadepublicacion;

        return $this;
    }

    /**
     * Get fechadepublicacion
     *
     * @return \DateTime 
     */
    public function getFechadepublicacion()
    {
        return $this->fechadepublicacion;
    }

    /**
     * Set autor
     *
     * @param string $autor
     * @return Libros
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get autor
     *
     * @return string 
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set ubicacion
     *
     * @param string $ubicacion
     * @return Libros
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
}
