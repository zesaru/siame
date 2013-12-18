<?php

namespace Embajada\ValijaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OficiosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numerodeoficio')
            ->add('asunto')
            ->add('fecha','date', array('widget' => 'single_text','format' => 'dd/MM/yyyy'
            ))
            ->add('referencia')
            ->add('clasificacion', 'choice', array(
                'choices' => array('Abierto' => 'Abierto', 'Cerrado' => 'Secreto')
            ))
            ->add('destino')
            ->add('aprobado')
            ->add('anexos')
            ->add('cuerpo','genemu_tinymce')
            ->add('ucreado')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Embajada\ValijaBundle\Entity\Oficios'
        ));
    }

    public function getName()
    {
        return 'embajada_valijabundle_oficiostype';
    }
}
