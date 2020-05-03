<?php 

	function conexion($usuario, $contra){
		try {
			$con = new PDO('mysql:host=localhost;dbname=pos', $usuario, $contra);
			return $con;
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}

 ?>