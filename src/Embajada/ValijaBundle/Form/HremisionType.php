<?php

namespace Embajada\ValijaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HremisionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numero','text')
            ->add('destino')
            ->add('asunto')
            ->add('fecha','date', array('widget' => 'single_text','format' => 'MM/dd/yyyy'
            ))
            ->add('ferencia')
            ->add('descripcion')
            ->add('sumilla')
            ->add('origen')
            ->add('observaciones')
            ->add('numerodevalija')
            ->add('direccion')
            ->add('estado')
            ->add('ucreado')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Embajada\ValijaBundle\Entity\Hremision'
        ));
    }

    public function getName()
    {
        return 'embajada_valijabundle_hremisiontype';
    }
}
