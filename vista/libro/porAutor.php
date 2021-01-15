<!DOCTYPE html>
<html>
    <head>
        <title>Listar Libros</title>
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
        <script>
            $(document).ready(function () {
                $('#myModal').on('shown.bs.modal', function () {
                    $('#myInput').trigger('focus')
                });
            });
        </script>
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
            header('Location: porAutor.php?pag=1');
        }
        if (!isset($_SESSION['letra']) || $_SESSION['letra'] == NULL) {
            $contenidoPorPag = 3;
            $w = $_SESSION['totalLibro'];
            $pagTotal = count($w);
            $paginas = ceil($pagTotal / $contenidoPorPag);
            $ini = ($_GET['pag'] - 1) * $contenidoPorPag;
            $l = Conexion::obtenerPorAutorLimit($ini);
        } else {
            $letra = $_SESSION['letra'];
            if (!strcmp($letra, 'autor') == 0) {//cuando quieres buscar por una letra
                $m = Conexion::obtenerAutor($letra);
                if (!$m == NULL) {
                    $contenidoPorPag = 3;
                    $pagTotal = count($m);
                    $paginas = ceil($pagTotal / $contenidoPorPag);
                    $ini = ($_GET['pag'] - 1) * $contenidoPorPag;
                    $l = Conexion::obtenerAutorLimit($ini, $letra);
                } else {
                    $_SESSION['letra'] = NULL;
                    header('Location: porAutor.php?pag=1');
                }
            } else {
                $_SESSION['letra'] = NULL;
                $contenidoPorPag = 3;
                $w = $_SESSION['totalLibro'];
                $pagTotal = count($w);
                $paginas = ceil($pagTotal / $contenidoPorPag);
                $ini = ($_GET['pag'] - 1) * $contenidoPorPag;
                $l = Conexion::obtenerPorAutorLimit($ini);
            }
        }
        include '../encuadres/cabecera.php';
        ?>

        <div class="container">
            <div class="row ">
                <div class="col">
                    <div class="breadcrumb">
                        <div class="breadcrumb-item"><a href="../../index.php">Home</a></div>
                        <div class="breadcrumb-item"><a href="listadoLibros.php?pag=1">Listar Libros</a></div>
                        <div class="breadcrumb-item active">Por Autor</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md col-sm col-lg mt-3 mb-3">
                    <h2 class="text-center fixed-tope">LIBROS ORDENADOS POR AUTOR</h2>
                    <form class="form-inline" action="../../controlador/controladorLibro.php" method="POST">
                        <div class="form-group mt-3 mb-3">
                            <select  name="filtro" class="form-control form-control-sm form-control-md form-control-lg">
                                <option value="autor"selected>Autor</option>
                                <?php
                                for ($i = 65; $i <= 90; $i++) {
                                    $letra = chr($i);
                                    echo ' <option value=' . $letra . '>' . $letra . '</option>';
                                }
                                ?>
                            </select>
                            <input type="submit" class="btn btn-primary" name="filtrarA" value="Filtrar">
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md col-sm col-lg">
                    <div class="table-responsive">                        
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Foto</th>
                                    <th>Titulo</th>
                                    <th>Autor</th>
                                    <th>Editorial</th>
                                    <th>Genéro</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($l as $key) {
                                    ?> 
                                <form class="form-inline" action="../../controlador/controladorLibro.php" method="POST">
                                    <tr>
                                        <td>
                                            <img id="fotoLibro" class="img-fluid" src="data:image/jpeg;base64,<?php echo base64_encode($key->getFoto()); ?>" alt='Foto no encontrada'/>
                                            <input type="hidden"  name="isbn" value="<?php echo $key->getIsbn(); ?>"/>
                                        </td>
                                        <td><?php echo $key->getNombre(); ?></td>
                                        <td><?php echo $key->getAutor(); ?></td>
                                        <td><?php echo $key->getEditorial(); ?></td>
                                        <td><?php echo $key->getGenero(); ?></td>             
                                        <td>
                                            <button type="button" id="agrandar" class="btn" data-toggle="modal" data-target="#exampleModal">
                                            </button>                                            
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h2 class="modal-title"><?php echo $key->getNombre(); ?></h2>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form-inline" action="../../controlador/controladorLibro.php" method="POST">
                                                                <div class="form-group mt-3 mb-3">
                                                                    <img id="fotoLibro" class="img-fluid" src="data:image/jpeg;base64,<?php echo base64_encode($key->getFoto()); ?>" alt='Foto no encontrada'/>
                                                                </div>
                                                                <div class="form-group mt-3 mb-3">
                                                                    <label>ISBN -> </label>
                                                                    <?php echo $key->getIsbn(); ?>
                                                                </div>
                                                                <div class="form-group mt-3 mb-3">
                                                                    <label>Nombre -> </label>
                                                                    <?php echo $key->getNombre(); ?>
                                                                </div>
                                                                <div class="form-group mt-3 mb-3">
                                                                    <label>Autor -> </label>
                                                                    <?php echo $key->getAutor(); ?>
                                                                </div>
                                                                <div class="form-group mt-3 mb-3">
                                                                    <label>Editorial -> </label>
                                                                    <?php echo $key->getEditorial(); ?>
                                                                </div>
                                                                <div class="form-group mt-3 mb-3">
                                                                    <label>Genero -> </label>
                                                                    <?php echo $key->getGenero(); ?>
                                                                </div>
                                                                <div class="form-group mt-3 mb-3">   
                                                                    <label>Descripcion -> </label>
                                                                    <?php echo $key->getDescripcion(); ?>
                                                                </div>
                                                                <div class="form-group mt-3 mb-3">
                                                                    <label>Año de edicción -> </label>
                                                                    <?php echo $key->getAnioEdiccion(); ?>
                                                                </div>
                                                                <div class="form-group mt-3 mb-3">
                                                                    <label>Nº pagina -> </label>
                                                                    <?php echo $key->getNPag(); ?>
                                                                </div>
                                                            </form>
                                                            <?php
                                                            if (isset($_SESSION['u'])) {
                                                                ?>
                                                                <h1>Noticia</h1>
                                                                <form class="form-inline" action="../../controlador/controladorGeneral.php" method="POST">
                                                                    <div class="form-group mt-3 mb-3">
                                                                        <img id="fotoUsu" src="data:image/jpeg;base64,<?php echo base64_encode($u->getFoto()); ?>" alt="foto usuario" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                                                                        <input type="hidden" class="form-control form-control-sm form-control-md form-control-lg" name="fotoUsuario" value="data:image/jpeg;base64,<?php echo base64_encode($u->getFoto()); ?>">
                                                                    </div>
                                                                    <div class="form-group mt-3 mb-3">
                                                                        <label><?php echo $u->getNombre(); ?></label> 
                                                                        <h4><small><i>Posted on <input type="text" style="border:none" class="form-control form-control-sm form-control-md form-control-lg" name="fechaNoticia"/></i></small></h4>
                                                                    </div>
                                                                    <div class="form-group mt-3 mb-3">
                                                                        <label>Asunto: </label>
                                                                        <input type="text" class="form-control form-control-sm form-control-md form-control-lg" name="asuntoNoticia" value="<?php echo $key->getNombre(); ?>"/>
                                                                    </div>  
                                                                    <div class="w-100"></div>
                                                                    <div class="form-group mt-3 mb-3"> 
                                                                        <textarea rows="10" cols="30" class="form-control form-control-sm form-control-md form-control-lg" name="descripcionNoticia" placeholder="Descripcion"></textarea>   
                                                                    </div>
                                                                    <div class="form-group mt-3 mb-3">
                                                                        <input type="submit" class="btn btn-primary" name="aniadirNoticia" value="Aceptar"/>
                                                                    </div>
                                                                </form>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
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
        </div>
        <nav aria-label="pagination">
            <ul class="pagination">
                <li class="page-item <?php echo $_GET['pag'] <= 1 ? 'disable' : '' ?>">
                    <a class="page-link" href="porAutor.php?pag=<?php $_GET['pag'] - 1; ?>">Previus</a>
                </li>
                <?php
                for ($i = 0; $i < $paginas; $i++) {
                    ?>
                    <li class="page-item <?php echo $_GET['pag'] == $i + 1 ? 'active' : '' ?>">
                        <a class="page-link" id="pagina" href="porAutor.php?pag=<?php echo $i + 1; ?>"><?php echo $i + 1; ?></a>
                    </li>
                    <?php
                }
                ?>
                <li class="page-item <?php echo $_GET['pag'] >= $paginas ? 'disable' : '' ?>">
                    <a class="page-link" href="porAutor.php?pag=<?php echo$_GET['pag'] + 1; ?>">Next</a>
                </li>
            </ul>
        </nav>
        <?php
        include '../encuadres/pie.php';
        ?>
    </body>
</html>