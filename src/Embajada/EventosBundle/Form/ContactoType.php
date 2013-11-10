<?php

namespace Embajada\EventosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContactoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('vocativo')
            ->add('nombres')
            ->add('apellidos')
            ->add('titulo1','text', array('required'=>false))
            ->add('titulo2','text', array('required'=>false))
            ->add('organizacion','text', array('required'=>false))
            ->add('dir1','text', array('required'=>false))
            ->add('dir2','text', array('required'=>false))
            ->add('codigopostal','text', array('required'=>false))
            ->add('telefono','text', array('required'=>false))
            ->add('fax','text', array('required'=>false))
            ->add('movil','text', array('required'=>false))
            ->add('email','text', array('required'=>false))
            ->add('observaciones','text', array('required'=>false))
            ->add('fechadeactualizacion')
            ->add('categoria')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Embajada\EventosBundle\Entity\Contacto'
        ));
    }

    public function getName()
    {
        return 'embajada_eventosbundle_contactotype';
    }
}
