<?php 

/**
 * CONEXION Y ESTANDAR DE CONTROL DE LA CRUD
 * CRUD GENERICO
 */

class Database extends PDO
{
	
	// definir atributos
	private $driver = 'mysql';
	private $host = 'localhost';
	private $dbName = 'solupelis';
	private $charset = 'utf8';
    private $user = 'root';
    private $password = '';

    // sobrecarga al constructor con cadena de conexion a la BD
	public function __construct()
	{
		try{
			// ESTANDAR
			// Hola jdajsdl
			parent::__construct("{$this->driver}:host={$this->host};
				dbname={$this->dbName}; charset={$this->charset}",$this->user,$this->password);
	        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
 			echo "Conexión Fallida {$e->getMessage()}";
        }

	}

	public function select($strSql, $arrayData = array(), $fetchMode=PDO::FETCH_OBJ)
	{ 
		// prepara al query
    	$query = $this->prepare($strSql);

        // asigna parametros al query si llegan como un array
    	foreach ($arrayData as $key => $value) {
    		
    		$query->bindParam(":$key",$value);	
    	}
        
        // valida si se ejecuta o no el query
    	if (!$query->execute()) {

    		echo "La consulta no se realizo";

    	}else{
            // devuelve el objeto del query
    		return $query->fetchAll($fetchMode);

    	}
	}

	public function insert($table, $data)
	{
		try {
			
			// metodo para ordenar el array de datos
			ksort($data);
			// eliminar los indices de controller y metodo
			unset($data['controller'],$data['method']);
 			// UNIR ELEMNTOS DE UN ARRAY EN UN SOLO STRING
			$fieldNames = implode('¨¨',array_keys($data));//array_keys trae los indices y values de los input que estoy enviando //de las tildes :v
			$fieldValues = ':'.implode(', :', array_keys($data));
 			// comillas como en mysql
			$strSql = $this->prepare("INSERT INTO $table(`$fieldNames`)VALUES ($fieldValues)");

			foreach ($data as $key => $value) {
					//asigna cada value del form a una key 
				$strSql->bindValue(":$key",$value);
			}

			$strSql->execute();
			

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function update()
	{
		
	}

	public function delete()
	{
		
	}
}




 ?>