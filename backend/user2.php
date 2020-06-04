<?php
include_once 'funciones.php';
$_SESSION['id_empleado'];
$userSession = new UserSession();
$correo = new User();
if(isset($_SESSION['id_empleado'])){
    //echo "hay sesion";
    $user->setUser($userSession->getCurrentUser());
}
$_SESSION['id_empleado']=$correo->getID();
?> 