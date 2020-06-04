<?php 
session_start();

if(isset($_SESSION['id_empleado']))
{
	session_destroy();
	header('location: login.php');
}


 ?>