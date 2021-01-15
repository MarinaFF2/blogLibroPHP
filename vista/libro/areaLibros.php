<!DOCTYPE html>
<!--menu para ir a las dos opcionones segun su rol-->
<html lang="es">
    <head>
        <title>Area Libro</title>
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
        if (isset($_SESSION['u'])) {
            $u = $_SESSION['u'];
        }
            $_SESSION['location'] = 'libros';
        include '../encuadres/cabecera.php';
        ?>

        <div class="container">
            <div class="row ">
                <div class="col-md col-sm col-lg">
                    <div class="breadcrumb">
                        <div class="breadcrumb-item"><a href="../../index.php">Home</a></div>
                        <div class="breadcrumb-item active">Area Libros</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                if ($u->getRol() == 2) { //admin
                    ?>
                    <div class="col-md col-sm col-lg">
                        <h1 class="text-center">Area libros</h1>
                        <form class="form-inline justify-content-center mb-5" action="../../controlador/controladorGeneral.php" method="POST">
                            <div class="row">
                                <div class="col-md col-sm col-lg">
                                    <div class="text-right ">
                                        <input type="submit" class="btn btn-primary" name="aniadirLibro" value="AniadirLibro" />
                                        <input type="submit" class="btn btn-primary" name="validarLibro" value="ValidarLibro"/>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                    <?php
                } else if ($u->getRol() == 1) { //usuario registrado
                    ?>
                    <h1 class="text-center">Area libros</h1>
                    <div class="col-md col-sm col-lg">
                        <form class="form-inline" action="../../controlador/controladorGeneral.php" method="POST">
                            <div class="row justify-content-center">
                                <div class="col-md col-sm col-lg">
                                    <div class="text-right ">
                                        <input type="submit" class="btn btn-primary" name="aniadirLibro" value="AniadirLibro" />
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php
        include '../encuadres/pie.php';
        ?>
    </body>
</html>