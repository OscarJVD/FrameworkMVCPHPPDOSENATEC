<?php 

/**
 * CLASE MovieController
 * CONTROLADOR ALGO ASI COMO UN JS
 */

require 'models/Movie.php';
require 'models/User.php';
require 'models/Status.php';
require 'models/Category.php';
// require 'models/Category_movie.php';

class MovieController 
{
    private $model;
    private $user;
    private $status;
    private $category;
    // private $category_movie;

    public function __construct()
    {
        try{
            $this->model = new Movie;
            $this->user = new User;
            $this->status = new Status;
            $this->category = new Category;
            // $this->category_movie = new Category_movie;

        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function index()
    {
        require 'views/layout.php';
        // Llamdo al metodo que trae la consulta
        $movies = $this->model->getAll();
        // $category_movie = $this->model->getCategoryMovie();
        require 'views/movie/list.php';

    }

    public function listCategories(){

        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $data = $this->model->getCategoriesMovieById($id);
            // $statuses = $this->status->getAll();
            $categories = $this->category->getAll();
        
            require 'views/layout.php';
            require 'views/partial/categories.php';
        }else{
            echo "Algo salio mal :D";
        }
    }

    // muestra la vista de crear
    public function add()
    {
        require 'views/layout.php';
        $users = $this->user->getAll();
        $categories = $this->category->getActiveCategories();
        require 'views/movie/new.php';

    }

    // realiza el proceso de guardar
    public function save()
    {
        // guardar en dos tablas movie y su detalle 

        // organizar array para la tabla movie
        $dataMovie = 
        [
            'name'        => $_POST['name'],
            'description' => $_POST['description'],
            'users_id'    => $_POST['users_id'],
            'status_id'   => 1
        
        ];

        // armar datos para category_movie que llegan desde el frontend
        $arrayCategories = isset($_POST['categories']) ? $_POST['categories'] : [];

        if (!empty($arrayCategories)) {

        // inserción de la película
        $respMovie = $this->model->newMovie($dataMovie);

        // obtener el ultimo id ingressado de la tabla movie
        $lastIdMovie = $this->model->getMovieLastId();
        // exit(var_dump($lastIdMovie));

        // inserción a la tabla category_movie
        $respCategoryMovie = $this->model->saveCategoryMovie($arrayCategories,
            $lastIdMovie[0]->id);
        
        }else{
            $respMovie = false;
            $respCategoryMovie = false;
        }

        // validar si las inserciones se han hecho correctamente
        // trabajo mutuo entre controlador y modelo
        $arrayResp = [];

        if ($respMovie == true && $respCategoryMovie == true) {
          $arrayResp = [
            'success' => true,
            'message' => "Película creada con exito :D"
          ];
        }else{
          $arrayResp = [
            'error' => true, //js :/ ? 
            'message' => "Error creando la Película"
          ];
        }

        echo json_encode($arrayResp); 
        return;

    }

    // muestra la vista de editar
    public function edit()
    {
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $data = $this->model->getMovieById($id);
            $statuses = $this->status->getAll();
            $users = $this->user->getAll();
            // $categories = $this->category->getActiveCategories();

            require 'views/layout.php';
            require 'views/movie/edit.php'; 

        }else{
            echo "Error :(";
        }
        
    }

    // realiza el proceso de editar
    public function update()
    {
        if(isset($_POST)){
            $this->model->editMovie($_POST);
            header('Location: ?controller=movie');
        }else{
            echo "Error :(";
        }
    }


    //  // realiza el proceso de eliminar
    // public function delete()
    // {
    //     $this->model->deleteMovie($_REQUEST);
    //     header('Location: ?controller=movie');
    // }
    // 
    public function updateMovieStatus()
    {
        $movie = $this->model->getMovieById($_REQUEST['id']);
       

        if ($movie[0]->status_id==1) {
            $data = [
                        'id' =>$movie[0]->id,
                        'status_id' => 2
                    ];
        }elseif($movie[0]->status_id==2){
            $data = [
                        'id' =>$movie[0]->id,
                        'status_id' => 1
                    ];
        }
        $this->model->editMovieStatus($data);
        header('Location: ?controller=movie');


    }
}


 ?>