<?php 

/**
 * CLASE RoleController
 * CONTROLADOR ALGO ASI COMO UN JS
 */

require 'models/Role.php';
require 'models/Status.php';


class RoleController 
{
    private $model;
    private $status;


    public function __construct()
    {
        $this->model = new Role;
        $this->status = new Status;

    }

    public function index()
    {
        require 'views/layout.php';
        // Llamdo al metodo que trae la consulta
        $roles = $this->model->getAll();
        require 'views/role/list.php';

    }

  

    public function updateRoleStatus()
    {
        $role = $this->model->getRoleById($_REQUEST['id']);
       

        if ($role[0]->status_id==1) {
            $data = [
                        'id' =>$role[0]->id,
                        'status_id' => 2
                    ];
        }elseif($role[0]->status_id==2){
            $data = [
                        'id' =>$role[0]->id,
                        'status_id' => 1
                    ];
        }
        $this->model->editRoleStatus($data);
        header('Location: ?controller=role');


    }
}


 ?>