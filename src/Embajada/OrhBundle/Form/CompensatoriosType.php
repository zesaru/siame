<?php

namespace Embajada\OrhBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CompensatoriosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('diasdecompensatorio')
            ->add('fechadesolicitud')
            ->add('fechadeaprobado')
            ->add('estado', 'choice', array(
                'choices' => array('1' => 'Aprobar', '2' => 'Denegar')))
            ->add('observaciones')
            ->add('fechadeevento1','date', array('widget' => 'single_text','format' => 'dd/MM/yyyy','required'  => false,
            ))
            ->add('fechadeevento2','date', array('widget' => 'single_text','format' => 'dd/MM/yyyy','required'  => false,
            ))
            ->add('fechadeevento3','date', array('widget' => 'single_text','format' => 'dd/MM/yyyy','required'  => false,
            ))
            ->add('fechadeevento4','date', 
                array('widget' => 'single_text','format' => 'dd/MM/yyyy','required'  => false,
            ))
            ->add('actividad1')
            ->add('actividad2')
            ->add('actividad3')
            ->add('actividad4')
            ->add('horadeinicio','time',array('widget' => 'single_text'))
            ->add('horadeinicio2', 'time',array('widget' => 'single_text'))
            ->add('horadeinicio3', 'time',array('widget' => 'single_text'))
            ->add('horadeinicio4', 'time',array('widget' => 'single_text'))
            ->add('horadefin1','time',array('widget' => 'single_text'))
            ->add('horadefin2', 'time',array('widget' => 'single_text'))
            ->add('horadefin3', 'time',array('widget' => 'single_text'))
            ->add('horadefin4', 'time',array('widget' => 'single_text'))
            ->add('cantidaddehoras1', 'text', array('required'  => false,))
            ->add('cantidaddehoras2', 'text', array('required'  => false,))
            ->add('cantidaddehoras3', 'text', array('required'  => false,))
            ->add('cantidaddehoras4', 'text', array('required'  => false,))
            //->add('ucreado')
            //->add('uaprobado')
            ->add('cantidaddia1')
            ->add('cantidaddia2')
            ->add('cantidaddia3')
            ->add('cantidaddia4')
            ->add('fechacompensatorio1','date', array('widget' => 'single_text','format' => 'dd/MM/yyyy','required'  => false,
            ))
            ->add('fechacompensatorio2','date', array('widget' => 'single_text','format' => 'dd/MM/yyyy','required'  => false,
            ))
            ->add('fechacompensatorio3','date', array('widget' => 'single_text','format' => 'dd/MM/yyyy','required'  => false,
            ))
            ->add('fechacompensatorio4','date', array('widget' => 'single_text','format' => 'dd/MM/yyyy','required'  => false,
            ))
            ->add('estado2')
            ->add('personaacargo', 'text', array('required'  => false,))
            ->add('turno1', 'text', array('required'  => false,))
            ->add('turno2', 'text', array('required'  => false,))
            ->add('turno3', 'text', array('required'  => false,))
            ->add('turno4', 'text', array('required'  => false,))
            //->add('fechadesolicitud2')
            //->add('fechadeaprobacion2')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Embajada\OrhBundle\Entity\Compensatorios'
        ));
    }

    public function getName()
    {
        return 'embajada_orhbundle_compensatoriostype';
    }
}
