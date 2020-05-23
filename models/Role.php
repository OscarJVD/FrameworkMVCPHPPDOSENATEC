<?php 

/**
 * Modelo de la tabla Users
 * CRUD.php
 */
class Role
{
	
	private $id_rol_PK;	
	private $nombre_rol;
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
			$strSql = "SELECT * FROM rol";
			// llamado al metodo general que ejecuta un select a la bd
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}


}

 ?>