<?php 

/**
 * CLASE UserController
 * CONTROLADOR ALGO ASI COMO UN JS
 */

require 'models/User.php';

class UserController 
{
	private $model;

	public function __construct()
	{
		$this->model = new User;
	}

    public function index()
    {
    	require 'views/layout.php';
    	// Llamdo al metodo que trae la consulta
    	$users = $this->model->getAll();
    	require 'views/user/list.php';

    }

    public function add()
    {
        require 'views/layout.php';
        require 'views/user/new.php';

    }

    public function save()
    {

        $this->model->newUser($_REQUEST);
        header('Location: ?controller=user');

    }
}


 ?>