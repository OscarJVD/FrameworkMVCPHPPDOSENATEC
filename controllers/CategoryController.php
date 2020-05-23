<?php 

/**
 * CLASE CategoryController
 * CONTROLADOR ALGO ASI COMO UN JS
 */

require 'models/Category.php';

class CategoryController 
{
	private $model;

	public function __construct()
	{
		$this->model = new Category;
	}

    public function index()
    {
    	require 'views/layout.php';
    	// Llamdo al metodo que trae la consulta
    	$categories = $this->model->getAll();
    	require 'views/category/list.php';

    }
}


 ?>