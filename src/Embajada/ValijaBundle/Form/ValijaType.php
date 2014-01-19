<?php

namespace Embajada\ValijaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ValijaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha','date', array('widget' => 'single_text','format' => 'dd/MM/yyyy'))
            ->add('numerodevalija')
            ->add('observaciones')
            ->add('cantidaddeitems')
            ->add('peso')
            ->add('pdf', 'file', array('required' => false))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Embajada\ValijaBundle\Entity\Valija'
        ));
    }

    public function getName()
    {
        return 'embajada_valijabundle_valijatype';
    }
}
