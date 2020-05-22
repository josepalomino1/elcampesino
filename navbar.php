<?php require_once('header.php');
?>
<ul id="slide-out" class="sidenav">
    <li>
        <div class="user-view">
            <div class="background">
                <img src="img/background.jpg">
            </div>
            <a href="#user"><img class="circle" src="img/user.png"></a>
            <a href="#name"><span class="white-text name">Jóse Palomino</span></a>
            <a href="#email"><span class="white-text email">jpalomino@matisan.com</span></a>
        </div>
    </li>
    <li><a href="/punto-venta-master/"><i class="material-icons">home</i>Inicio</a></li>
    <li><a href="ventas.php"><i class="material-icons">shopping_cart</i>Vender</a></li>
    <li><a href="compras.php"><i class="material-icons">shopping_cart</i>Comprar</a></li>
    <li><a class="dropdown-trigger" href="#!" data-target="dropdown-clientes">Clientes<i
                class="material-icons">person</i></a>
    </li>
    <ul id='dropdown-clientes' class='dropdown-content'>
        <li><a href="clientes.php"><i class="material-icons">person</i>Clientes</a></li>
        <li><a href="cliente.php"><i class="material-icons">search</i>Buscar</a></li>
        <li><a href="#"><i class="material-icons">add</i>Agregar</a></li>
        <li><a href="#" class="subheader"><i class="material-icons">remove</i>Eliminar</a></li>
    </ul>
    <li><a class="dropdown-trigger" href="#!" data-target="dropdown-perfil">Perfil<i
                class="material-icons">settings</i></a></li>
    <ul id='dropdown-perfil' class='dropdown-content'>
        <li><a href="#"><i class="material-icons">edit</i>Editar perfil</a></li>
        <li><a href="#"><i class="material-icons">lock</i>Cambiar contraseña</a></li>
        <div class="divider"></div>
        <li><a href="cerrar.php"><i class="material-icons">exit_to_app</i>Cerrar sesión</a></li>
    </ul>
    </div>
    </li>
</ul>


<!-- Inicio NAVBAR-->
<div class="navbar-fixed">
    <nav class="nav-wrapper teal lighten-2 class">
        <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="material-icons">menu</i></a>
        <a href="/punto-venta-master/" class="brand-logo center"><img src="img/logo.png" alt="El Campesino" width="150" /></a>


    </nav>
</div>
<?php require_once('footer.php'); ?>
