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
            ->add('estado')
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
            ->add('horadeinicio','text'
            )
            ->add('horadeinicio2', 'text')
            ->add('horadeinicio3', 'text')
            ->add('horadeinicio4', 'text')
            ->add('horadefin1', 'text')
            ->add('horadefin2', 'text')
            ->add('horadefin3', 'text')
            ->add('horadefin4', 'text')
            ->add('cantidaddehoras1', 'text', array('required'  => false,))
            ->add('cantidaddehoras2', 'text', array('required'  => false,))
            ->add('cantidaddehoras3', 'text', array('required'  => false,))
            ->add('cantidaddehoras4', 'text', array('required'  => false,))
            ->add('ucreado')
            ->add('uaprobado')
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
