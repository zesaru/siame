<?php
// src/Cupon/OfertaBundle/Controller/AdminController.php

namespace Embajada\InventarioBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;

class AdminController extends Controller
{

	protected function configureListFields(ListMapper $mapper)
		{
		$mapper
			->add('descripcion')
			->addIdentifier('nombre', null, array('label' => 'Título'))
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
			->add('condiciones')
			->add('fecha', 'datetime')
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
			->add('fotografias')
			->add('observaciones')			

		;
		}

}