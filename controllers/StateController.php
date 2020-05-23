<?php 

/**
 * CLASE UserController
 * CONTROLADOR ALGO ASI COMO UN JS
 */

require 'models/State.php';

class StateController 
{
	private $model;

	public function __construct()
	{
		$this->model = new State;
	}

    public function index()
    {
    	require 'views/layout.php';
    	// Llamdo al metodo que trae la consulta
    	$states = $this->model->getAll();
    	require 'views/state/list.php';

    }
}


 ?>