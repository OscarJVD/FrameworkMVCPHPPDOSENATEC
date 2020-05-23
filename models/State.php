<?php 

/**
 * Modelo de la tabla estado
 * CRUD.php
 */
class State
{
	
	private $id_estado_PK;
	private $nombre_estado;
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
			$strSql = "SELECT * FROM estado";
			// llamado al metodo general que ejecuta un select a la bd
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}


}

 ?>