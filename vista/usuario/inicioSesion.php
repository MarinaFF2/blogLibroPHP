<!DOCTYPE html>
<html>
    <head>
        <title>Inicio sesion</title>
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
                        <div class="breadcrumb-item active">Inicio Sesión</div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center"> 
                <div class="col-md-4 col-sm-4 col-lg-4 mt-3 mb-3">
                    <h1>Iniciar Sesión</h1>
                    <form class="form-inline" action="../../controlador/controladorUsuario.php" method="POST">
                        <div class="row">
                            <div class="col-sm col-md col-lg mt-3 mb-3">
                                <div class="form-group-sm form-group-md form-group-lg mt-3 mb-3">
                                    <label for="email">Usuario:</label>
                                    <input type="text"class="form-control form-control-sm form-control-md form-control-lg ml-3" id="usuario" name="correo" placeholder="usuario@x.x"><br>
                                </div>
                                <div class="form-group-sm form-group-md form-group-lg mt-3 mb-3">
                                    <label for="pwd">Contraseña:</label>
                                    <input type="password" class="form-control form-control-sm form-control-md form-control-lg ml-3" id="pwd" name="clave" placeholder="Contraseña"><br>
                                </div>
                                <div class="form-group-sm form-group-md form-group-lgmt-3 mb-3">
                                    <a href="registrarse.php" class="ml-3">Registrarse</a>
                                    <a href="olvidarPwd.php" class="ml-3">He olvidado la contraseña</a><br>
                                </div>
                                <div class="form-group-md form-group-sm form-group-lg mt-3 mb-3 ml-3">
                                    <input type="submit" class="btn btn-primary mt-3" id="aceptar" name="aceptarInicioSesion" value="Aceptar">
                                    <input type="submit" class="btn btn-warning mt-3 ml-3" name="volverIndex" value="Volver">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        include '../pie.php';
        ?>
    </body>
</html>