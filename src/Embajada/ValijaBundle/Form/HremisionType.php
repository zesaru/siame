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
            ->add('numero')
            ->add('destino')
            ->add('asunto')
            ->add('fecha','date', array('widget' => 'single_text','format' => 'dd/MM/yyyy'
            ))
            ->add('ferencia','text',array('required'=> false)) 
            ->add('descripcion')
            ->add('sumilla')
            ->add('origen')
            ->add('observaciones','textarea',array('required'=> false))
            ->add('direccion')
            ->add('estado')
            ->add('ucreado')
            ->add('peso','text',array('required'=> false))
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
