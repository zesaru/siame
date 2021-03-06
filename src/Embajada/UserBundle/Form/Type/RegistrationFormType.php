<?php

namespace Embajada\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        //add your custom field
        $builder->add('name');
        $builder->add('apellidos');
        $builder->add('fechadeingreso');
        $builder->add('numerodediasdevacaciones');
    }

    public function getName()
    {
        return 'embajada_user_registration';
    }
}