<?php 

/**
 * Modelo de la tabla Users
 * CRUD.php
 */
class Category
{
	
	private $id_categoria_pelicula_PK;
	private $nombre_categoria;
	private $id_estado_FK;
	private $pdo;


	public function __construct()
	{
    	try {
    		$this->pdo = new Database;
    	} catch (PDOException $e) {
    		die($e->getMessage());
    	}
	}

	public function getAll()
	{
		try {
			$strSql = "SELECT * FROM categoria_pelicula";
			// llamado al metodo general que ejecuta un select a la bd
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}


}

 ?>