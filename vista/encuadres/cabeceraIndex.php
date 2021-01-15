<?php
require_once 'clase/Conexion.php';
require_once 'clase/Usuario.php';


session_start();

if (isset($_SESSION['u'])) {
    $u = $_SESSION['u'];
    $n = 0;
} else {
    $n = 1;
}
?>
<header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="index.php">
            <img id="icono" src="img/iconos/logotipo.svg"/>
        </a>
        <a class="navbar-brand" href="index.php">
            <h1>Tsundoku</h1>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php
        //Menusss
        if ($n == 1) {//usuario no registrado
            ?>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link" href="vista/noticia/noticias.php?pag=1">Noticias</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Listar Libros</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="vista/libro/porNombre.php?pag=1">Por Nombre</a>
                            <a class="dropdown-item" href="vista/libro/porGenero.php?pag=1">Por Género</a>
                            <a class="dropdown-item" href="vista/libro/porAutor.php?pag=1">Por Autor</a>
                        </div>
                    </li>
                </ul>
            </div>
            <form class="form-inline" action="controlador/controladorGeneral.php" method="POST">
                <input type="submit" class="btn btn-primary" name="iniciarSesion" value="IniciarSesion"/>
            </form>
            <?php
        } else if ($u->getRol() == 1) { //usuario registrado
            ?>
            <div class="collapse navbar-collapse"  id="menu">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link" href="vista/noticia/noticias.php?pag=1">Noticias</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Listar Libros</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="vista/libro/porNombre.php?pag=1">Por Nombre</a>
                            <a class="dropdown-item" href="vista/libro/porGenero.php?pag=1">Por Género</a>
                            <a class="dropdown-item" href="vista/libro/porAutor.php?pag=1">Por Autor</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Area Libros</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="vista/libro/aniadirLibros.php">Añadir Libros</a>
                        </div>
                    </li>
                </ul>
            </div>
            <form class="form-inline" action="controlador/controladorGeneral.php" method="POST">
                <button type="submit" id="perfil" class="mr-5" style="background-image: url('data:image/jpeg;base64,<?php echo base64_encode($u->getFoto()); ?>');" name="perfil" alt="no se encuentra" value="Perfil"></button>
                <input type="submit" class="btn btn-danger" name="cerrarSesion" value="CerrarSesion"/>
            </form>
            <?php
        } else if ($u->getRol() == 2) { //admin
            ?>
            <div class="collapse navbar-collapse"  id="menu">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link" href="vista/noticia/noticias.php?pag=1">Noticias</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Listar Libros</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="vista/libro/porNombre.php?pag=1">Por Nombre</a>
                            <a class="dropdown-item" href="vista/libro/porGenero.php?pag=1">Por Género</a>
                            <a class="dropdown-item" href="vista/libro/porAutor.php?pag=1">Por Autor</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Area Libros</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="vista/libro/aniadirLibros.php">Añadir Libros</a>
                            <a class="dropdown-item" href="vista/libro/validarLibros.php?pag=1">Validar Libros</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link" href="vista/usuario/crudUsuario.php?pag=1">Crud Usuario</a>
                    </li>
                </ul>                            
            </div>
            <form class="form-inline" action="controlador/controladorGeneral.php" method="POST">
                <button type="submit"id="perfil" class="mr-5" style="background-image: url('data:image/jpeg;base64,<?php echo base64_encode($u->getFoto()); ?>');" name="perfil" alt="no se encuentra" value="Perfil"></button>
                <input type="submit" class="btn btn-danger" name="cerrarSesion" value="CerrarSesion"/>
            </form>
            <?php
        }
        ?>                            
    </nav>
</header>

