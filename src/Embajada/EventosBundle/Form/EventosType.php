<?php

namespace Embajada\EventosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EventosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('lugar')
            ->add('funcionarioencargado','text',array ('label'=> 'Responsable'))
            ->add('numerodeasistentes','integer', array ('label'=> 'Cantidad'))
            ->add('fecha','date', array('widget' => 'single_text','format' => 'dd/MM/yyyy'))
            ->add('hora', 'time' , array ('widget' => 'single_text'))
            ->add('epli', 'text', array ('label'=> 'Responsable de lista de invitados'))
            ->add('eiti', 'text', array ('label'=> 'Responsable de imprimir las tarjetas'))
            ->add('ecyi', 'text', array ('label'=> 'Responsable del envio de invitaciones'))
            ->add('err' ,'text', array ('label'=> 'Responsable de respuestas'))
            ->add('pfuncionarios','text', array ('label'=> 'Funcionarios'))
            ->add('padministrativos','text', array ('label'=> 'Administrativos'))
            ->add('tipodeusoauditorio')
            ->add('numerodesillas')
            ->add('numerodemesas')
            ->add('tipo','choice', array(
                'choices' => array('Coctel' => 'Coctel', 'Almuerzo Sentado' => 'Almuerzo Sentado', 'Almuerzo Bufet' => 'Almuerzo Bufet', 'Cena Sentada' => 'Cena Sentada', 'Cena Bufet' => 'Cena Bufet')))
            ->add('mozos', 'checkbox', array(
                    'label'     => 'Show this entry publicly?',
                    'required'  => false,
                ))
            ->add('otrosmozos')
            ->add('empresasdemozos')
            ->add('nombrepersonaldeapoyo')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Embajada\EventosBundle\Entity\Eventos'
        ));
    }

    public function getName()
    {
        return 'embajada_eventosbundle_eventostype';
    }
}
