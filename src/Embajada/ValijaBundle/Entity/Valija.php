<?php

namespace Embajada\ValijaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Valija
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Embajada\ValijaBundle\Entity\ValijaRepository")
 */
class Valija
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;

    /**
     * @var integer
     *
     * @ORM\Column(name="numerodevalija", type="integer")
     */
    private $numerodevalija;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="text", nullable=true)
     */
    private $observaciones;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidaddeitems", type="integer", nullable=true)
     */
    private $cantidaddeitems;

    /**
     * @var string
     *
     * @ORM\Column(name="peso", type="decimal", nullable=true)
     */
    private $peso;

    /**
    * @ORM\Column(type="string")
    *
    * 
    */
    private $pdf;

    /**
    * Sube el directorio directorio que se indica y
    * guardando en la entidad la ruta de la foto
    *
    * @param string $directorioDestino Ruta completa del directorio al que se sube el pdf
    */
    public function subirPdf($directorioDestino)
    {
        if (null===$this->pdf) {
            return;
        }

        $nombreArchivoPdf = uniqid('guia-').'-1.'.$this->pdf->guessExtension();

        $this->pdf->move($directorioDestino, $nombreArchivoPdf);

        $this->setPdf($nombreArchivoPdf);
    }

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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Valija
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
     * Set numerodevalija
     *
     * @param integer $numerodevalija
     * @return Valija
     */
    public function setNumerodevalija($numerodevalija)
    {
        $this->numerodevalija = $numerodevalija;

        return $this;
    }

    /**
     * Get numerodevalija
     *
     * @return integer 
     */
    public function getNumerodevalija()
    {
        return $this->numerodevalija;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return Valija
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
     * Set cantidaddeitems
     *
     * @param integer $cantidaddeitems
     * @return Valija
     */
    public function setCantidaddeitems($cantidaddeitems)
    {
        $this->cantidaddeitems = $cantidaddeitems;

        return $this;
    }

    /**
     * Get cantidaddeitems
     *
     * @return integer 
     */
    public function getCantidaddeitems()
    {
        return $this->cantidaddeitems;
    }

    /**
     * Set peso
     *
     * @param string $peso
     * @return Valija
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
    * Set pdf
    *
    * @param string $pdf
    */
        public function setPdf($pdf)
        {
            $this->pdf = $pdf;
        }

    /**
    * Get pdf
    *
    * @return string
    */
    public function getPdf()
    {
        return $this->pdf;
    }
}
