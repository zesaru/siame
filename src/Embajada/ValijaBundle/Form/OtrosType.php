<?php

namespace Embajada\ValijaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OtrosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('destinatario')
            ->add('contenido')
            ->add('remitente')
            ->add('peso')
            ->add('fecha','date', array('widget' => 'single_text','format' => 'dd/MM/yyyy'
            ))
            ->add('estado')

        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Embajada\ValijaBundle\Entity\Otros'
        ));
    }

    public function getName()
    {
        return 'embajada_valijabundle_otrostype';
    }
}
