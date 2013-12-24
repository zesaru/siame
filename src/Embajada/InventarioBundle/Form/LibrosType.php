<?php

namespace Embajada\InventarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LibrosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo')
            ->add('volumen')
            ->add('tomo')
            ->add('fechadepublicacion')
            ->add('autor')
            ->add('ubicacion')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Embajada\InventarioBundle\Entity\Libros'
        ));
    }

    public function getName()
    {
        return 'embajada_inventariobundle_librostype';
    }
}
