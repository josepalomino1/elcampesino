<?php 

	function conexion($usuario, $contra){
		try {
			$con = new PDO('mysql:host=localhost;dbname=pos', 'root', '');
			return $con;
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}

	function verificar_session()
{
	if(!isset($_SESSION['id_empleado']))
	{
		header('location: login.php');
	}
}



?>

	

