<!DOCTYPE html>
<html>
    <head>
        <title>Añadir Libro</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Course CSS -->
        <link rel="stylesheet" type="text/css" href="../../css/css_general.css" media="screen" />

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
        session_start();

        $_SESSION['location'] = 'libros';
        $d = $_SESSION['location'];

        include '../encuadres/cabecera.php';
        ?>
        <div class="container">
            <div class="row ">
                <div class="col-md col-sm col-lg">
                    <div class="breadcrumb">
                        <div class="breadcrumb-item"><a href="../../index.php">Home</a></div>
                        <div class="breadcrumb-item"><a href="areaLibros.php">Area Libros</a></div>
                        <div class="breadcrumb-item active">Añadir Libros</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm col-md col-lg">
                    <h1 class="text-center">Añadir Libro</h1>
                    <form class="form-inline justify-content-center" action="../../controlador/controladorLibro.php" method="POST" enctype="multipart/form-data">
                        <div class="row justify-content-center">
                            <div class="col-sm col-md col-lg border border-primary mt-3 mb-3">
                                <div class="form-group mt-3 mb-3 justify-content-center">
                                    <label class="col-label-sm col-label-md col-label-lg mr-3">ISBN:</label>
                                    <input type="text" class="form-control form-control-sm form-control-md form-control-lg" name="isbn"/> 
                                </div>
                                <div class="form-group mt-3 mb-3 justify-content-center">
                                    <label class="col-label-sm col-label-md col-label-lg mr-3">Título:</label>
                                    <input type="text" class="form-control form-control-sm form-control-md form-control-lg" placeholder="1º letra con mayúscula" name="nombre" pattern="[A-Z]{1}[azZ]{1-50}"/> 
                                </div>
                                <div class="form-group mt-3 mb-3 justify-content-center">
                                    <label class="col-label-sm col-label-md col-label-lg mr-3">Autor:</label>
                                    <input type="text" class="form-control form-control-sm form-control-md form-control-lg" placeholder="1º letra con mayúscula" name="autor" pattern="[A-Z]{1}[azZ]{1-50}"/> 
                                </div>
                                <div class="form-group mt-3 mb-3 justify-content-center">
                                    <label class="col-label-sm col-label-md col-label-lg mr-3">Editorial:</label>
                                    <input type="text" class="form-control form-control-sm form-control-md form-control-lg" name="editorial" pattern="[A-Za-z]{1-50}"/> 
                                </div>
                                <div class="form-group mt-3 mb-3 justify-content-center">
                                    <label class="col-label-sm col-label-md col-label-lg mr-3">Género:</label>
                                    <input type="text" class="form-control form-control-sm form-control-md form-control-lg" placeholder="1º letra con mayúscula" name="genero" pattern="[A-Z]{1}[azZ]{1-50}"/> 
                                </div>
                                <div class="form-group mt-3 mb-3 justify-content-center">
                                    <label class="col-label-sm col-label-md col-label-lg mr-3">Descripcion:</label>
                                    <textarea rows="10" cols="30" class="form-control form-control-sm form-control-md form-control-lg"  name="descripcion"></textarea>
                                </div>
                                <div class="form-group mt-3 mb-3 justify-content-center">
                                    <label class="col-label-sm col-label-md col-label-lg mr-3">Año de edicción:</label>
                                    <input type="number" class="form-control form-control-sm form-control-md form-control-lg" name="anioEdi"/> 
                                </div>
                                <div class="form-group mt-3 mb-3 justify-content-center">
                                    <label class="col-label-sm col-label-md col-label-lg mr-3">Nº de páginas:</label>
                                    <input type="number" class="form-control form-control-sm form-control-md form-control-lg" name="nPag"/> 
                                </div>
                                <div class="form-control mt-3 mb-3 justify-content-center">
                                    <label class="col-label-sm col-label-md col-label-lg mr-3">Foto:</label>
                                    <input type="file" class="form-control-file form-control-sm" name="foto"/> 
                                </div>
                                <div class="text-right mt-3 mb-3 justify-content-center">
                                    <input type="submit" class="btn btn-primary mr-3" name="aniadirLibro" value="AniadirLibro" />
                                </div>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
        <?php
        include '../encuadres/pie.php';
        ?>
    </body>
</html>
