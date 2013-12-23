<?php

namespace Embajada\DocumentosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MemoiType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numerodememo','text')
            ->add('remitente', 'choice', array(
                'choices' => array('Embajador del Peru' => 'Embajador del Peru', 
                'Jefe de Cancilleria' => 'Jefe de Cancilleria')
            ))
            ->add('destinatario', 'choice', array(
                'choices' => array('CONSULADOS GENERALES, DIPLOMATICOS Y PERSONAL ADMINISTRATIVO' => 'Todos D, A, CONSULADOS',
                    'TODO EL PERSONAL DIPLOMATICO Y ADMINISTRATIVO' => 'Todo el Personal D y A', 
                    'TODO LOS FUNCIONARIOS' => 'Diplomaticos',
                    'TODO EL PERSONAL ADMINISTRATIVO' => 'Administrativo',
                    'TODO EL PERSONAL DE SERVICIO' => 'Servicio',
                    'A LOS CONSULADOS GENERALES' => 'Consulados',
                    'CONSULADO GENERAL EN TOKIO' => 'Tokio',
                    'CONSULADO GENERAL EN NAGOYA' => 'Nagoya',
                    'OTROS' => 'Otros',
                    ),'empty_value' => 'Elige destinatario'
            ))
            ->add('dindividuales', 'choice', array(
                'choices' => array(
                    'MC Marco Antonio Santivanez' => 'Marco Antonio Santivanez',
                    'CON Antonio Miranda' => 'Antonio Miranda', 
                    'SS Ormar Ortega Ortega' => 'Ormar Ortega Ortega',
                    'Yoshiko Tanaka' => 'Yoshiko Tanaka',
                    'Reiko Kon' => 'Reiko Kon',
                    'Hiroko Miyauchi' => 'Hiroko Miyauchi',
                    'Keiko Araneda' => 'Keiko Araneda',
                    'Delia Wakao' => 'Delia Wakao',
                    'Tessy Shibata' => 'Tessy Shibata',
                    'Akiko Uemise' => 'Akiko Uemise',
                    'Cesar Murillo' => 'Cesar Murillo',
                    ),'empty_value' => 'Elige un nombre'
            ))
            ->add('fecha')
            ->add('referencia')
            ->add('cuerpo','genemu_tinymce')
            ->add('aprobado')
            ->add('clasificacion', 'choice', array(
                'choices' => array('Abierto' => 'Abierto', 'Confidencial' => 'Confidencial')
            ))
            ->add('ucreado')
            ->add('asunto')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Embajada\DocumentosBundle\Entity\Memoi'
        ));
    }

    public function getName()
    {
        return 'embajada_documentosbundle_memoitype';
    }
}
