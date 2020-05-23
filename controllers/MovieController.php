<?php 

/**
 * CLASE UserController
 * CONTROLADOR ALGO ASI COMO UN JS
 */

require 'models/Movie.php';

class MovieController
{
	private $model;

	public function __construct()
	{
		$this->model = new Movie;
	}

    public function index()
    {
    	require 'views/layout.php';
    	// Llamdo al metodo que trae la consulta
    	$movies = $this->model->getAll();
    	require 'views/movie/list.php';

    }
}


 ?>