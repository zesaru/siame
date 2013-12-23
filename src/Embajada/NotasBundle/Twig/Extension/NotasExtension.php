<?php

namespace Embajada\NotasBundle\Twig\Extension;


use Symfony\Component\Translation\TranslatorInterface;

/**
 * Extensión propia de Twig con filtros y funciones útiles para
 * la aplicación
 */
class NotasExtension extends \Twig_Extension
{
    private $translator;

    public function __construct(TranslatorInterface $translator = null)
    {
        $this->translator = $translator;
    }

    public function getTranslator()
    {
        return $this->translator;
    }

    public function getFilters()
    {
        return array(

         //nombre de filtro en minuscula
            'mostrar_primer_caracter' => new \Twig_Filter_Method($this,'mostrarPrimerCaracter', array('is_safe' => array('cadena'))),
            'sumar_fechas' => new \Twig_Filter_Method($this,'sumarDias', array('is_safe' => array('vfecha'))),
            'restar_fechas' => new \Twig_Filter_Method($this,'restarDias', array('is_safe' => array('rfecha'))),
            'fecha' => new \Twig_Filter_Method($this, 'fecha'),

        );
    }

    /**
     * Formatea la fecha indicada según las características del locale seleccionado.
     * Se utiliza para mostrar correctamente las fechas en el idioma de cada usuario.
     *
     * @param string $fecha        Objeto que representa la fecha original
     * @param string $formatoFecha Formato con el que se muestra la fecha
     * @param string $formatoHora  Formato con el que se muestra la hora
     * @param string $locale       El locale al que se traduce la fecha
     */
    public function fecha($fecha, $formatoFecha = 'medium', $formatoHora = 'none', $locale = 'es')
    {
        // Código copiado de
        //   https://github.com/thaberkern/symfony/blob
        //   /b679a23c331471961d9b00eb4d44f196351067c8
        //   /src/Symfony/Bridge/Twig/Extension/TranslationExtension.php

        // Formatos: http://www.php.net/manual/en/class.intldateformatter.php#intl.intldateformatter-constants
        $formatos = array(
            // Fecha/Hora: (no se muestra nada)
            'none'   => \IntlDateFormatter::NONE,
            // Fecha: 12/13/52  Hora: 3:30pm
            'short'  => \IntlDateFormatter::SHORT,
            // Fecha: Jan 12, 1952  Hora:
            'medium' => \IntlDateFormatter::MEDIUM,
            // Fecha: January 12, 1952  Hora: 3:30:32pm
            'long'   => \IntlDateFormatter::LONG,
            // Fecha: Tuesday, April 12, 1952 AD  Hora: 3:30:42pm PST
            'full'   => \IntlDateFormatter::FULL,
        );

        $formateador = \IntlDateFormatter::create(
            $locale != null ? $locale : $this->getTranslator()->getLocale(),
            $formatos[$formatoFecha],
            $formatos[$formatoHora]
        );

        if ($fecha instanceof \DateTime) {
            return $formateador->format($fecha);
        } else {
            return $formateador->format(new \DateTime($fecha));
        }
    }


  /**
     * Muestra como una lista HTML el contenido de texto al que se
     * aplica el filtro. Cada "\n" genera un nuevo elemento de
     * la lista.
     *str_repeat("&nbsp;", 15)
     * @param string $value El texto que se transforma
     * @param string $tipo  Tipo de lista a generar ('ul', 'ol')
     */

    public function mostrarPrimerCaracter($value)
    {

        $cadena = mb_substr ($value, 0, 1);


        return $cadena;
    }

    public function sumarDias($value, $numero)
    {
        $valor=$value;
        $partes=explode("/",$valor);//lo combierto en arreglo para poder sumar
        $dia=mktime(0,0,0,$partes[1],$partes[2]+$numero,$partes[0]);
        $vfecha = date("Y/m/d",$dia);


        return $vfecha;
    }

    public function restarDias($value, $numero)
    {
        ///$start_ts = strtotime($value);
        //$end_ts = strtotime($end);
        //$diff = $end_ts - $start_ts;
        //return round($diff / 86400); 
        ///$rfecha = $end;
        ///return $rfecha;
        $valor=$value;
        $partes=explode("/",$valor);//lo combierto en arreglo para poder sumar
        $dia=mktime(0,0,0,$partes[1],$partes[2]+$numero,$partes[0]);
        $rfecha = date("Y/m/d",$dia);   

        return $rfecha;     
    }

    public function getName()
    {
        return 'notas';
    }
}
