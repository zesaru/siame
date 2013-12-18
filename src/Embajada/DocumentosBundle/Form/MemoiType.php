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
            ->add('numerodememo')
            ->add('remitente')
            ->add('destinatario')
            ->add('fecha')
            ->add('referencia')
            ->add('cuerpo')
            ->add('aprobado')
            ->add('clasificacion')
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
