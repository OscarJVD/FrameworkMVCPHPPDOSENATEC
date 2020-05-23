<?php 

/**
 * CLASE RoleController
 * CONTROLADOR ALGO ASI COMO UN JS
 */

require 'models/Role.php';

class RoleController 
{
	private $model;

	public function __construct()
	{
		$this->model = new Role;
	}

    public function index()
    {
    	require 'views/layout.php';
    	// Llamdo al metodo que trae la consulta
    	$roles = $this->model->getAll();
    	require 'views/role/list.php';

    }
}


 ?>