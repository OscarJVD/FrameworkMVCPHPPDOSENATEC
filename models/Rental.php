<?php 

/**
 * Modelo de la tabla Users
 * CRUD.php
 */
class Rental
{			
	private $id;	
	private $start_date;
	private $end_date;
	private $status_id;
	private $total;
	private $user_id;
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
			$strSql = "SELECT re.*,s.status as status,u.name as user FROM rentals re INNER JOIN statuses s ON s.id = re.status_id
						INNER JOIN users u ON u.id = re.user_id ORDER BY re.id ASC";
			// llamado al metodo general que ejecuta un select a la bd
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
    
    // peticion request
	public function newRental($data)
	{
		try {
			$data['status_id'] = 1;
			$this->pdo->insert('rentals', $data);
		} catch (PDOException $e){
			die($e->getMessage());
		}
	}

	public function getRentalById($id)
	{
		try {			
			$strSql = "SELECT * FROM rentals WHERE id=:id";
			$arrayData = ['id'=>$id];
			$query = $this->pdo->select($strSql, $arrayData);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}


	public function editRental($data)
	{
		try {			
			$strWhere = 'id = '.$data['id'];
			$this->pdo->update('rentals',$data,$strWhere);

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function editRentalStatus($data){
		try {
			$strWhere = 'id =' . $data['id'];
			$this->pdo->update('rentals',$data,$strWhere);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

}

 ?>