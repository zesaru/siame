<?php

namespace Embajada\InventarioBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

class InventarioAdmin extends Admin
{
	protected function configureListFields(ListMapper $mapper)
		{
		$mapper
			->addIdentifier('descripcion')
			->add('doc')
			->add('numerodoc')
			->add('fecha')
			->add('valor')
		;
		}
	protected function configureFormFields(FormMapper $mapper)
		{
		$mapper
			->add('descripcion')
			->add('doc', null, array('required' => false))
			->add('numerodoc')
			->add('fecha', 'date')
			->add('valor')
			->add('marca')
			->add('modelo')
			->add('serie')
			->add('medida')
			->add('color')
			->add('estado')
			->add('situacionregistro')
			->add('estadoanterior')
			->add('ubicacion')
			->add('codigomision')
			->add('fotografia', 'file', array('data_class' => 'Symfony\Component\HttpFoundation\File\File',
			'property_path' => 'fotografia'
			))
			->add('observaciones')			

		;
		}   
}