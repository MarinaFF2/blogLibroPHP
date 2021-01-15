<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Olvidar Contraseña</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Course CSS -->
        <link rel="stylesheet" type="text/css" href="../../css/css_general.css" media="screen" />
        <script src="../../jquery-3.4.1.min.js"></script>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
    </head>
    <body>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <?php
        session_start();
        $_SESSION['location'] = 'usuarios';
        include '../encuadres/cabecera.php';
        ?>

        <div class="container">
            <div class="row">
                <div class="col-sm col-md col-lg">
                    <div class="breadcrumb">
                        <div class="breadcrumb-item"><a href="../../index.php">Home</a></div>
                        <div class="breadcrumb-item"><a href="inicioSesion.php">Inicio Sesión</a></div>
                        <div class="breadcrumb-item active">Recuperar contraseña</div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">                 
                <div class="col-md-5 col-sm-5 col-lg-5 mt-3">                    
                    <h1>Recuperar contraseña</h1>
                    <form class="form-inline" action="../../controlador/controladorGeneral.php" method="POST">
                        <div class="row">
                            <div class="col-sm col-md col-lg mb-3">
                                <div class="form-group mt-3 mb-3">
                                    <label class="col-label-sm col-label-md col-label-lg mr-3">Introduce tu correo: </label>
                                    <input type="email" id="correo" class="form-control form-control-sm form-control-md form-control-lg" name="email" placeholder="usuario"/> 
                                    <label class="col-label-sm col-label-md col-label-lg mr-3">*Sino aparace en el menu principal del correo, mira en spam* </label>
                                </div>                                
                                <div class="text-right  mt-3 mb-3">
                                    <input type="submit" class="btn btn-primary" name="botOlvidoPwd" value="Recuperar contraseña">
                                    <input type="button" class="btn btn-warning" value="Volver" onclick="goBack()">
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