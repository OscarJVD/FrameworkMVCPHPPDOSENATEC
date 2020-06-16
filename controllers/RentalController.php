<?php 

/**
 * CLASE RentalController
 * CONTROLADOR ALGO ASI COMO UN JS
 */

require 'models/Rental.php';
require 'models/Status.php';
require 'models/User.php';

class RentalController 
{

	private $model;
    private $status;
    private $user;


	public function __construct()
	{
		$this->model = new Rental;
        $this->status = new Status;
        $this->user = new User;
	}

    public function index()
    {
    	require 'views/layout.php';
    	// Llamdo al metodo que trae la consulta
    	$rentals = $this->model->getAll();
    	require 'views/rental/list.php';

    }

    // muestra la vista de crear
    public function add()
    {
        $users = $this->user->getAll();
        require 'views/layout.php';
        require 'views/rental/new.php';

    }

    // realiza el proceso de guardar
    public function save()
    {

        $this->model->newRental($_REQUEST);
        header('Location: ?controller=rental');

    }

    // muestra la vista de editar
    public function edit()
    {
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $data = $this->model->getRentalById($id);
            $statuses = $this->status->getAll();
            $users = $this->user->getAll();
    
            require 'views/layout.php';
            require 'views/rental/edit.php'; 

        }else{
            echo "Error :(";
        }
        
    }

    // realiza el proceso de editar
    public function update()
    {
        if(isset($_POST)){
            $this->model->editRental($_POST);
            header('Location: ?controller=rental');
        }else{
            echo "Error :(";
        }
    }


    public function updateRentalStatus()
    {
        $rental = $this->model->getRentalById($_REQUEST['id']);
       

        if ($rental[0]->status_id==1) {
            $data = [
                        'id' =>$rental[0]->id,
                        'status_id' => 2
                    ];
        }elseif($rental[0]->status_id==2){
            $data = [
                        'id' =>$rental[0]->id,
                        'status_id' => 1
                    ];
        }
        $this->model->editRentalStatus($data);
        header('Location: ?controller=rental');


    }

}


 ?>