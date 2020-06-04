<?php 
    require_once("backend/empleado.php");
    $empleado = new empleado();
    $empleados = $empleado::obtenerTipoEmpleado();
    require_once("backend/sucursal.php");
    $sucursal = new sucursal();
    $sucursales = $sucursal::ObtenerSucursales();
    require_once('header.php');
?>
<ul id="slide-out" class="sidenav">
    <li>
        <div class="user-view">
            <div class="background">
                <img src="img/background.jpg">
            </div>
            <a href="#user"><img class="circle" src="<?php echo $_SESSION['imagen']; ?>"></a>
            <span class="white-text name"><?php echo $_SESSION['nombre']." ".$_SESSION['apellido'];?></span>
            <span class="white-text email "><?php echo $_SESSION['correo']."<br>";
                   foreach ($empleados as $key1) {
                       if($_SESSION['id_tipo_empleado'] == $key1[0]){
                           echo $key1[1];
                       }
                   }
                   echo " -- ";
                    foreach ($sucursales as $key) {
                        if($_SESSION['id_sucursal'] == $key[0]){
                            echo $key[1];
                        }
                    }
                ?>
            </span>
        </div>
    </li>
    <!--Usuario ADMINISTRADOR-->
    <div name="admin">
        <?php if($_SESSION['id_tipo_empleado'] == 1): ?>
        <li><a href="/punto-venta-master/"><i class="material-icons">home</i>Inicio</a></li>
        <li><a href="/punto-venta-master/"><i class="material-icons">dashboard</i>Dashboard</a></li>
        <li><a href="reportes.php"><i class="material-icons">insert_chart</i>Reportes</a></li>
        <li><a href="ventas.php"><i class="material-icons">shopping_cart</i>Vender</a></li>
        <li><a href="compras.php"><i class="material-icons">shopping_cart</i>Comprar</a></li>
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown-empleados">Empleados<i
                    class="material-icons">person</i></a></li>
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown-clientes">Clientes<i
                    class="material-icons">person</i></a></li>
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown-proveedores">Proveedores<i
                    class="material-icons">person</i></a></li>
        <li><a href="sucursales.php"><i class="material-icons">business</i>Sucursales</a></li>

        <li><a class="dropdown-trigger" href="#!" data-target="dropdown-perfil">Perfil<i
                    class="material-icons">settings</i></a></li>

        <ul id='dropdown-empleados' class='dropdown-content'>
            <li><a href="cliente.php"><i class="material-icons">search</i>Buscar</a></li>
            <li><a href="nuevo_usuario.php"><i class="material-icons">add</i>Agregar</a></li>
            <li><a href="#" class="subheader"><i class="material-icons">remove</i>Eliminar</a></li>
        </ul>
        <ul id='dropdown-reportes' class='dropdown-content'>
            <li><a href="#"><i class="material-icons">search</i>General</a></li>
            <li><a href="#"><i class="material-icons">add</i>Por Sucursal</a></li>
        </ul>
        <ul id='dropdown-clientes' class='dropdown-content'>
            <li><a href="clientes.php"><i class="material-icons">person</i>Clientes</a></li>
            <li><a href="cliente.php"><i class="material-icons">search</i>Buscar</a></li>
            <li><a href="nuevo_cliente.php"><i class="material-icons">add</i>Agregar</a></li>
            <li><a href="#" class="subheader"><i class="material-icons">remove</i>Eliminar</a></li>
        </ul>

        <ul id='dropdown-proveedores' class='dropdown-content'>
            <li><a href="proveedores.php"><i class="material-icons">person</i>Proveedores</a></li>
            <li><a href="proveedor.php"><i class="material-icons">search</i>Buscar</a></li>
            <li><a href="nuevo_proveedor.php"><i class="material-icons">add</i>Agregar</a></li>
            <li><a href=""><i class="material-icons">remove</i>Eliminar</a></li>
        </ul>
        <ul id='dropdown-perfil' class='dropdown-content'>
            <li><a href="#"><i class="material-icons">edit</i>Editar perfil</a></li>
            <li><a href="#"><i class="material-icons">lock</i>Cambiar contraseña</a></li>
            <div class="divider"></div>
            <li><a href="cerrar.php"><i class="material-icons">exit_to_app</i>Cerrar sesión</a></li>
        </ul>
        <?php endif; ?>
    </div>
    <!--Usuario CONTADOR-->
    <div name="contador">
        <?php if($_SESSION['id_tipo_empleado'] == 2): ?>
        <li><a href="/punto-venta-master/"><i class="material-icons">home</i>Inicio</a></li>
        <li><a href="/punto-venta-master/"><i class="material-icons">dashboard</i>Dashboard</a></li>
        <li><a href="/punto-venta-master/"><i class="material-icons">insert_chart</i>Reportes</a></li>
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown-perfil">Perfil<i
                    class="material-icons">settings</i></a></li>
        <ul id='dropdown-clientes' class='dropdown-content'>
            <li><a href="clientes.php"><i class="material-icons">person</i>Clientes</a></li>
            <li><a href="cliente.php"><i class="material-icons">search</i>Buscar</a></li>
            <li><a href="nuevo_cliente.php"><i class="material-icons">add</i>Agregar</a></li>
            <li><a href="#" class="subheader"><i class="material-icons">remove</i>Eliminar</a></li>
        </ul>
        <ul id='dropdown-perfil' class='dropdown-content'>
            <li><a href="#"><i class="material-icons">edit</i>Editar perfil</a></li>
            <li><a href="#"><i class="material-icons">lock</i>Cambiar contraseña</a></li>
            <div class="divider"></div>
            <li><a href="cerrar.php"><i class="material-icons">exit_to_app</i>Cerrar sesión</a></li>
        </ul>
        <?php endif; ?>
    </div>
    <!--Usuario VENDEDOR-->
    <div name="vendedor">
        <?php if($_SESSION['id_tipo_empleado'] == 3): ?>
        <li><a href="/punto-venta-master/"><i class="material-icons">home</i>Inicio</a></li>
        <li><a href="ventas.php"><i class="material-icons">shopping_cart</i>Vender</a></li>
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown-clientes">Clientes<i
                    class="material-icons">person</i></a></li>
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown-perfil">Perfil<i
                    class="material-icons">settings</i></a></li>

        <ul id='dropdown-clientes' class='dropdown-content'>
            <li><a href="clientes.php"><i class="material-icons">person</i>Clientes</a></li>
            <li><a href="cliente.php"><i class="material-icons">search</i>Buscar</a></li>
            <li><a href="nuevo_cliente.php"><i class="material-icons">add</i>Agregar</a></li>
            <li><a href="#" class="subheader"><i class="material-icons">remove</i>Eliminar</a></li>
        </ul>
        <ul id='dropdown-perfil' class='dropdown-content'>
            <li><a href="#"><i class="material-icons">edit</i>Editar perfil</a></li>
            <li><a href="#"><i class="material-icons">lock</i>Cambiar contraseña</a></li>
            <div class="divider"></div>
            <li><a href="cerrar.php"><i class="material-icons">exit_to_app</i>Cerrar sesión</a></li>
        </ul>
        <?php endif; ?>
    </div>
    <!--Usuario BODEGUERO-->
    <div name="bodeguero">
        <?php if($_SESSION['id_tipo_empleado'] == 4): ?>
        <li><a href="/punto-venta-master/"><i class="material-icons">home</i>Inicio</a></li>
        <li><a href="compras.php"><i class="material-icons">shopping_cart</i>Comprar</a></li>
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown-clientes">Proveedores<i
                    class="material-icons">person</i></a></li>
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown-perfil">Perfil<i
                    class="material-icons">settings</i></a></li>

        <ul id='dropdown-clientes' class='dropdown-content'>
            <li><a href=""><i class="material-icons">person</i>Proveedores</a></li>
            <li><a href=""><i class="material-icons">search</i>Buscar</a></li>
            <li><a href="nuevo_proveedor.php"><i class="material-icons">add</i>Agregar</a></li>
            <li><a href=""><i class="material-icons">remove</i>Eliminar</a></li>
        </ul>
        <ul id='dropdown-perfil' class='dropdown-content'>
            <li><a href="#"><i class="material-icons">edit</i>Editar perfil</a></li>
            <li><a href="#"><i class="material-icons">lock</i>Cambiar contraseña</a></li>
            <div class="divider"></div>
            <li><a href="cerrar.php"><i class="material-icons">exit_to_app</i>Cerrar sesión</a></li>
        </ul>
        <?php endif; ?>
    </div>

</ul>
<!-- Inicio NAVBAR-->
<div class="navbar-fixed">
    <nav class="nav-wrapper teal lighten-2 class">
        <a href="" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="material-icons">menu</i></a>
        <a href="/punto-venta-master/" class="brand-logo center"><img src="img/logo.png" alt="El Campesino"
                width="150" /></a>
    </nav>
</div>
<?php require_once('footer.php');?>