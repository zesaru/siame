<?php

namespace Embajada\OrhBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VacacionesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechadesolitud','date', array('widget' => 'single_text','format' => 'dd/MM/yyyy'
            ))
            ->add('cantidad')
            ->add('aprobado', 'choice', array(
                'choices' => array('1' => 'Aprobar', '2' => 'Denegar')
            ))
            ->add('fechadeinicio','date', array('widget' => 'single_text','format' => 'dd/MM/yyyy'
            ))
            ->add('fechadefin','date', array('widget' => 'single_text','format' => 'dd/MM/yyyy'
            ))
            ->add('comentario')
            ->add('fechadeaprobacion')
            ->add('observaciones')
            ->add('uaprobado')
            ->add('ucreado')
        ;

    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Embajada\OrhBundle\Entity\Vacaciones'
        ));
    }

    public function getName()
    {
        return 'embajada_orhbundle_vacacionestype';
    }
}
