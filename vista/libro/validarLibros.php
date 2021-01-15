<!DOCTYPE html>
<html>
    <head>
        <title>Validar Libros</title>
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
        require_once '../../clase/Conexion.php';
        require_once '../../clase/Libro.php';

        session_start();
        
        $_SESSION['location'] = 'libros';
        if (!$_GET['pag']) {
            header('Location: validarLibros.php?pag=1');
        } else {
            $contenidoPorPag = 3;
            $w = $_SESSION['totalLibro'];
            $pagTotal = count($w);
            $paginas = ceil($pagTotal / $contenidoPorPag);
            $ini = ($_GET['pag'] - 1) * $contenidoPorPag;
            $l = Conexion::obtenerLibroLimit($ini);
        }
        include '../encuadres/cabecera.php';
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md col-sm col-lg">
                    <div class="breadcrumb">
                        <div class="breadcrumb-item"><a href="../../index.php">Home</a></div>
                        <div class="breadcrumb-item"><a href="areaLibros.php">Area Libros</a></div>
                        <div class="breadcrumb-item active">Validar Libros</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md col-sm col-lg">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <h2 class="text-center">CRUD LIBROS</h2>
                            <thead class="thead-dark">
                                <tr>
                                    <th></th>
                                    <th>Foto</th>
                                    <th>ISBN</th>
                                    <th>Titulo</th>
                                    <th>Autor</th>
                                    <th>Editorial</th>
                                    <th>Genéro</th>
                                    <th>Descripción</th>
                                    <th>Año de edicción</th>
                                    <th>Nº páginas</th>
                                    <th></th>
                                    <th></th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($l as $key) {
                                    ?>
                                <form class = "form-inline" action = "../../controlador/controladorLibro.php" method = "POST" enctype="multipart/form-data">
                                    <tr>
                                        <?php
                                        if ($key->getActiva() == 0) {
                                            ?>
                                            <td>
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="acti custom-control-input"  name="activado"/>
                                                    <span class="custom-control-indicator"></span>
                                                </label>
                                            </td>
                                            <?php
                                        } else if ($key->getActiva() == 1) {
                                            ?>
                                            <td>
                                                <label class="custom-control custom-checkbox">                                                    
                                                    <input type="checkbox" class="acti custom-control-input" name="activado" checked/>
                                                    <span class="custom-control-indicator"></span>
                                                </label>
                                            </td>
                                            <?php
                                        }
                                        ?>
                                        <td style="width: 35px">
                                            <img id="fotoLibro" src="data:image/jpeg;base64,<?php echo base64_encode($key->getFoto()); ?>" alt='Foto no encontrada'/>
                                            <input type="file" id="foto" class="imge form-control-file form-control-sm" name="foto"/> 
                                        </td>
                                        <td><input type="text" class="in" class="form-control form-control-sm form-control-md form-control-lg" name="isbn" value="<?php echo $key->getIsbn(); ?>"/></td>
                                        <td><input type="text" class="in" class="form-control form-control-sm form-control-md form-control-lg" name="nombre" value="<?php echo $key->getNombre(); ?>"/></td>
                                        <td><input type="text" class="in" class="form-control form-control-sm form-control-md form-control-lg" name="autor" value="<?php echo $key->getAutor(); ?>"/></td>
                                        <td><input type="text" class="in" class="form-control form-control-sm form-control-md form-control-lg" name="editorial" value="<?php echo $key->getEditorial(); ?>"/></td>
                                        <td><input type="text" class="in" class="form-control form-control-sm form-control-md form-control-lg" name="genero" value="<?php echo $key->getGenero(); ?>"/></td>
                                        <td><textarea rows="6" cols="20" class="form-control form-control-sm form-control-md form-control-lg" name="descripcion"><?php echo $key->getDescripcion(); ?>"</textarea></td>
                                        <td><input type="text" id="anioEdiccion" class="form-control form-control-sm form-control-md form-control-lg" name="anioEdi" value="<?php echo $key->getAnioEdiccion(); ?>"/></td>                                
                                        <td><input type="text"  id="nPag" class="form-control form-control-sm form-control-md form-control-lg" name="nPag" value="<?php echo $key->getNPag(); ?>"/></td>
                                        <td><button type="submit" id="editar" name="editar" /></td>
                                        <td><button type="submit" id="eliminar"  name="eliminar" /></td>
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
                <div class="col-md col-sm col-lg">
                    <nav aria-label="pagination">
                        <ul class="pagination">
                            <li class="page-item <?php echo $_GET['pag'] <= 1 ? 'disable' : '' ?>">
                                <a class="page-link" href="validarLibros.php?pag=<?php $_GET['pag'] - 1; ?>">Previus</a>
                            </li>
                            <?php
                            for ($i = 0; $i < $paginas; $i++) {
                                ?>
                                <li class="page-item <?php echo $_GET['pag'] == $i + 1 ? 'active' : '' ?>">
                                    <a class="page-link" id="pagina" href="validarLibros.php?pag=<?php echo $i + 1; ?>"><?php echo $i + 1; ?></a>
                                </li>
                                <?php
                            }
                            ?>
                            <li class="page-item <?php echo $_GET['pag'] >= $paginas ? 'disable' : '' ?>">
                                <a class="page-link" href="validarLibros.php?pag=<?php echo$_GET['pag'] + 1; ?>">Next</a>
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