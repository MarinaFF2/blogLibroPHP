<?php
require_once '../../clase/Usuario.php';
require_once '../../clase/Conexion.php';
session_start();

$location = $_SESSION['location'];
if (isset($_SESSION['u'])) {
    $u = $_SESSION['u'];
    $n = 0;
} else {
    $n = 1;
}
switch ($location) {
    case 'libros':
        ?>
        <header>
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
                <a class="navbar-brand" href="../../index.php">
                    <img id="icono" src="../../img/iconos/logotipo.svg"/>
                </a>
                <a class="navbar-brand" href="../../index.php">
                    <h1>Tsundoku</h1>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php
                if ($n == 1) {//usuario no registrado
                    ?>
                    <div class="collapse navbar-collapse" id="menu">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a href="../../index.php" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a  class="nav-link" href="../noticia/noticias.php?pag=1">Noticias</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Listar Libros</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="porNombre.php?pag=1">Por Nombre</a>
                                    <a class="dropdown-item" href="porGenero.php?pag=1">Por Género</a>
                                    <a class="dropdown-item" href="porAutor.php?pag=1">Por Autor</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <form class="form-inline" action="../../controlador/controladorGeneral.php" method="POST">
                        <input type="submit" class="btn btn-primary" name="iniciarSesion" value="IniciarSesion"/>
                    </form>
                    <?php
                } else if ($u->getRol() == 1) { //usuario registrado
                    ?>
                    <div class="collapse navbar-collapse" id="menu">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a href="../../index.php" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a  class="nav-link" href="../noticia/noticias.php?pag=1">Noticias</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Listar Libros</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="porNombre.php?pag=1">Por Nombre</a>
                                    <a class="dropdown-item" href="porGenero.php?pag=1">Por Género</a>
                                    <a class="dropdown-item" href="porAutor.php?pag=1">Por Autor</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Area Libros</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="aniadirLibros.php">Añadir Libros</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <form class="form-inline" action="../../controlador/controladorGeneral.php" method="POST">
                        <button type="submit"id="perfil" class="mr-5" style="background-image: url('data:image/jpeg;base64,<?php echo base64_encode($u->getFoto()); ?>');" name="perfil" alt="no se encuentra"></button>
                        <input type="submit" class="btn btn-danger" name="cerrarSesion" value="CerrarSesion"/>
                    </form>
                    <?php
                } else if ($u->getRol() == 2) { //admin
                    ?>
                    <div class="collapse navbar-collapse" id="menu">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a href="../../index.php" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a  class="nav-link" href="../noticia/noticias.php?pag=1">Noticias</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Listar Libros</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="porNombre.php?pag=1">Por Nombre</a>
                                    <a class="dropdown-item" href="porGenero.php?pag=1">Por Género</a>
                                    <a class="dropdown-item" href="porAutor.php?pag=1">Por Autor</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Area Libros</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="aniadirLibros.php">Añadir Libros</a>
                                    <a class="dropdown-item" href="validarLibros.php?pag=1">Validar Libros</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a  class="nav-link" href="../usuario/crudUsuario.php?pag=1">Crud Usuario</a>
                            </li>
                        </ul>
                    </div>
                    <form class="form-inline" action="../../controlador/controladorGeneral.php" method="POST">
                        <button type="submit"id="perfil" class="mr-5" style="background-image: url('data:image/jpeg;base64,<?php echo base64_encode($u->getFoto()); ?>');" name="perfil" alt="no se encuentra"></button>
                        <input type="submit" class="btn btn-danger" name="cerrarSesion" value="CerrarSesion"/>
                    </form>
                    <?php
                }
                ?>
            </nav>
        </header>
        <?php
        break;
    case 'noticias':
        ?>
        <header>
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
                <a class="navbar-brand" href="../../index.php">
                    <img id="icono" src="../../img/iconos/logotipo.svg"/>
                </a>
                <a class="navbar-brand" href="../../index.php">
                    <h1>Tsundoku</h1>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php
                if ($n == 1) {//usuario no registrado
                    ?>
                    <div class="collapse navbar-collapse" id="menu">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a href="../../index.php" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a  class="nav-link" href="noticias.php?pag=1">Noticias</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Listar Libros</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="../libro/porNombre.php?pag=1">Por Nombre</a>
                                    <a class="dropdown-item" href="../libro/porGenero.php?pag=1">Por Género</a>
                                    <a class="dropdown-item" href="../libro/porAutor.php?pag=1">Por Autor</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <form class="form-inline" action="../../controlador/controladorGeneral.php" method="POST">
                        <input type="submit" class="btn btn-primary" name="iniciarSesion" value="IniciarSesion"/>
                    </form>
                    <?php
                } else if ($u->getRol() == 1) { //usuario registrado
                    ?>
                    <div class="collapse navbar-collapse" id="menu">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a href="../../index.php" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a  class="nav-link" href="noticias.php?pag=1">Noticias</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Listar Libros</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="../libro/porNombre.php?pag=1">Por Nombre</a>
                                    <a class="dropdown-item" href="../libro/porGenero.php?pag=1">Por Género</a>
                                    <a class="dropdown-item" href="../libro/porAutor.php?pag=1">Por Autor</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Area Libros</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="../libro/aniadirLibros.php">Añadir Libros</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <form class="form-inline" action="../../controlador/controladorGeneral.php" method="POST">
                        <button type="submit"id="perfil" class="mr-5" style="background-image: url('data:image/jpeg;base64,<?php echo base64_encode($u->getFoto()); ?>');" name="perfil" alt="no se encuentra"></button>
                        <input type="submit" class="btn btn-danger" name="cerrarSesion" value="CerrarSesion"/>
                    </form>
                    <?php
                } else if ($u->getRol() == 2) { //admin
                    ?>
                    <div class="collapse navbar-collapse" id="menu">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a href="../../index.php" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a  class="nav-link" href="noticias.php?pag=1">Noticias</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Listar Libros</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="../libro/porNombre.php?pag=1">Por Nombre</a>
                                    <a class="dropdown-item" href="../libro/porGenero.php?pag=1">Por Género</a>
                                    <a class="dropdown-item" href="../libro/porAutor.php?pag=1">Por Autor</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Area Libros</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="../libro/aniadirLibros.php">Añadir Libros</a>
                                    <a class="dropdown-item" href="../libro/validarLibros.php?pag=1">Validar Libros</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a  class="nav-link" href="../usuario/crudUsuario.php?pag=1">Crud Usuario</a>
                            </li>
                        </ul>
                    </div>
                    <form class="form-inline" action="../../controlador/controladorGeneral.php" method="POST">
                        <button type="submit"id="perfil" class="mr-5" style="background-image: url('data:image/jpeg;base64,<?php echo base64_encode($u->getFoto()); ?>');" name="perfil" alt="no se encuentra"></button>
                        <input type="submit" class="btn btn-danger" name="cerrarSesion" value="CerrarSesion"/>
                    </form>
                    <?php
                }
                ?>
            </nav>
        </header>
        <?php
        break;
    case 'usuarios':
        ?>
        <header>
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
                <a class="navbar-brand" href="../../index.php">
                    <img id="icono" src="../../img/iconos/logotipo.svg"/>
                </a>
                <a class="navbar-brand" href="../../index.php">
                    <h1>Tsundoku</h1>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php
                if ($n == 1) {//usuario no registrado
                    ?>
                    <div class="collapse navbar-collapse" id="menu">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a href="../../index.php" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a  class="nav-link" href="../noticia/noticias.php?pag=1">Noticias</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Listar Libros</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="../libro/porNombre.php?pag=1">Por Nombre</a>
                                    <a class="dropdown-item" href="../libro/porGenero.php?pag=1">Por Género</a>
                                    <a class="dropdown-item" href="../libro/porAutor.php?pag=1">Por Autor</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <form class="form-inline" action="../../controlador/controladorGeneral.php" method="POST">
                        <input type="submit" class="btn btn-primary" name="iniciarSesion" value="IniciarSesion"/>
                    </form>
                    <?php
                } else if ($u->getRol() == 1) { //usuario registrado
                    ?>
                    <div class="collapse navbar-collapse" id="menu">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a href="../../index.php" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a  class="nav-link" href="../noticia/noticias.php?pag=1">Noticias</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Listar Libros</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="../libro/porNombre.php?pag=1">Por Nombre</a>
                                    <a class="dropdown-item" href="../libro/porGenero.php?pag=1">Por Género</a>
                                    <a class="dropdown-item" href="../libro/porAutor.php?pag=1">Por Autor</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Area Libros</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="../libro/aniadirLibros.php">Añadir Libros</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <form class="form-inline" action="../../controlador/controladorGeneral.php" method="POST">
                        <button type="submit"id="perfil" class="mr-5" style="background-image: url('data:image/jpeg;base64,<?php echo base64_encode($u->getFoto()); ?>');" name="perfil" alt="no se encuentra"></button>
                        <input type="submit" class="btn btn-danger" name="cerrarSesion" value="CerrarSesion"/>
                    </form>
                    <?php
                } else if ($u->getRol() == 2) { //admin
                    ?>
                    <div class="collapse navbar-collapse" id="menu">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a href="../../index.php" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a  class="nav-link" href="../noticia/noticias.php?pag=1">Noticias</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Listar Libros</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="../libro/porNombre.php?pag=1">Por Nombre</a>
                                    <a class="dropdown-item" href="../libro/porGenero.php?pag=1">Por Género</a>
                                    <a class="dropdown-item" href="../libro/porAutor.php?pag=1">Por Autor</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Area Libros</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="../libro/aniadirLibros.php">Añadir Libros</a>
                                    <a class="dropdown-item" href="../libro/validarLibros.php?pag=1">Validar Libros</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a  class="nav-link" href="crudUsuario.php?pag=1">Crud Usuario</a>
                            </li>
                        </ul>
                    </div>
                    <form class="form-inline" action="../../controlador/controladorGeneral.php" method="POST">
                        <button type="submit"id="perfil" class="mr-5" style="background-image: url('data:image/jpeg;base64,<?php echo base64_encode($u->getFoto()); ?>');" name="perfil" alt="no se encuentra"></button>
                        <input type="submit" class="btn btn-danger" name="cerrarSesion" value="CerrarSesion"/>
                    </form>
                    <?php
                }
                ?>
            </nav>
        </header>
        <?php
        break;
}
?>