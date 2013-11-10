<?php

namespace Embajada\EventosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EventoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('vocativo')
            ->add('cantidad')
            ->add('horadeinvitacion')
            ->add('fechalainvitacion')
            ->add('contacto')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Embajada\EventosBundle\Entity\Evento'
        ));
    }

    public function getName()
    {
        return 'embajada_eventosbundle_eventotype';
    }
}
