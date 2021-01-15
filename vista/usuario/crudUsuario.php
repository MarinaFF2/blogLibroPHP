<!DOCTYPE html>
<html>
    <head>
        <title>Crud Usuario</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Course CSS -->
        <link rel="stylesheet" type="text/css" href="../../css/css_general.css" media="screen" />        
        <link rel="stylesheet" type="text/css" href="../../css/css_tabla.css" media="screen" />

        <script src="../../jquery-3.4.1.min.js"></script>
<!--        <script src="../js/registrarse.js"></script>-->
    </head>
    <body>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <?php
        require_once '../../clase/Usuario.php';
        require_once '../../clase/Conexion.php';

        session_start();

        if (isset($_SESSION['u'])) {
            $u = $_SESSION['u'];
        }

        $_SESSION['location'] = 'usuarios';

        if (!$_GET['pag']) {
            header('Location: crudUsuario.php?pag=1');
        } else {
            $contenidoPorPag = 4;
            $w = Conexion::obtenerUsuarios();
            $pagTotal = count($w);
            $paginas = ceil($pagTotal / $contenidoPorPag);
            $ini = ($_GET['pag'] - 1) * $contenidoPorPag;
            $usu = Conexion::obtenerUsuariosLimit($ini);
        }

        include '../encuadres/cabecera.php';
        ?>

        <div class="container">  
            <div class="row">
                <div class="col-sm col-md col-lg">
                    <div class="breadcrumb">
                        <div class="breadcrumb-item"><a href="../../index.php">Home</a></div>
                        <div class="breadcrumb-item active">Crud Usuario</div>
                    </div>   
                </div>
            </div>
            <div class="row">
                <div class="col-sm col-md col-lg">
                    <h2 class="text-center">CRUD USUARIOS</h2>
                    <div class="table-responsive ">
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th></th>
                                    <th class="imge">Foto</th>
                                    <th>Correo</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Edad</th>
                                    <th>Rol</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($usu as $key) {
                                    ?>
                                <form class="form-inline" action="../../controlador/controladorUsuario.php" method="POST">
                                    <tr>
                                        <?php
                                        if ($key->getActivo() == 0) {
                                            ?>
                                            <td>
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="acti custom-control-input" name="activo"/>
                                                    <span class="custom-control-indicator"></span>
                                                </label>
                                            </td>
                                            <?php
                                        } else if ($key->getActivo() == 1) {
                                            ?>
                                            <td>
                                                <label class="custom-control custom-checkbox">                                                    
                                                    <input type="checkbox" class="acti custom-control-input" name="activo" checked/>
                                                    <span class="custom-control-indicator"></span>
                                                </label>
                                            </td>
                                            <?php
                                        }
                                        ?>
                                        <td class="imge">
                                            <img id="fotoLibro" class="imge" src="data:image/jpeg;base64,<?php echo base64_encode($key->getFoto()); ?>" alt='Foto no encontrada'/>
                                        </td>
                                        <td><input type="text" class="in" class="form-control form-control-sm form-control-md form-control-lg" name="correo" value="<?php echo $key->getCorreo(); ?>" readonly/></td>
                                        <td><input type="text" class="in" class="form-control form-control-sm form-control-md form-control-lg" name="nombre" value="<?php echo $key->getNombre(); ?>"/></td>
                                        <td><input type="text" class="in" class="form-control form-control-sm form-control-md form-control-lg" name="apellido" value="<?php echo $key->getApellido(); ?>"/></td>
                                        <td><input type="number" id="edad" class="form-control form-control-sm form-control-md form-control-lg" name="edad" value="<?php echo $key->getEdad(); ?>"/></td>
                                        <?php
                                        if ($key->getRol() == 1) {
                                            ?>
                                            <td>
                                                <input type="submit" name="rol" value="Usuario"/>
                                            </td>
                                            <?php
                                        } else if ($key->getRol() == 2) {
                                            ?>
                                            <td>
                                                <input type="submit" name="rol" value="Administrador"/>
                                            </td>
                                            <?php
                                        }
                                        ?>
                                            <td><button type="submit" id="editar" class="btn" name="editar" /></td>
                                            <td><button type="submit" id="eliminar" class="btn" name="eliminar" /></td>
                                    </tr>
                                </form>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm col-md col-lg">
                    <nav aria-label="pagination">
                        <ul class="pagination">
                            <li class="page-item <?php echo $_GET['pag'] <= 1 ? 'disable' : '' ?>">
                                <a class="page-link" href="crudUsuario.php?pag=<?php $_GET['pag'] - 1; ?>">Previus</a>
                            </li>
                            <?php
                            for ($i = 0; $i < $paginas; $i++) {
                                ?>
                                <li class="page-item <?php echo $_GET['pag'] == $i + 1 ? 'active' : '' ?>">
                                    <a class="page-link" id="pagina" href="crudUsuario.php?pag=<?php echo $i + 1; ?>"><?php echo $i + 1; ?></a>
                                </li>
                                <?php
                            }
                            ?>
                            <li class="page-item <?php echo $_GET['pag'] >= $paginas ? 'disable' : '' ?>">
                                <a class="page-link" href="crudUsuario.php?pag=<?php echo$_GET['pag'] + 1; ?>">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <?php
        include '../encuadres/pie.php';
        ?>
    </body>
</html>