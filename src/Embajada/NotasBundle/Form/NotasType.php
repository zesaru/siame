<?php

namespace Embajada\NotasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NotasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numerodenota','text',array('required'=> false, 'read_only'=> true))
            ->add('cuerpo')
            ->add('sumilla')
            ->add('fecha','date',array('widget' => 'single_text','format' => 'dd/MM/yyyy'
            ))
            ->add('idioma', 'choice', array(
                'choices' => array('es' => 'Espanol', 'in' => 'Ingles'),
                'empty_value' => 'Elige un idioma'
            ))         
            ->add('destinatario')
            ->add('aprobado','checkbox', array('required'=> false ))
            ->add('observaciones', 'textarea', array('required'=>false))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Embajada\NotasBundle\Entity\Notas'
        ));
    }

    public function getName()
    {
        return 'embajada_notasbundle_notastype';
    }
}
