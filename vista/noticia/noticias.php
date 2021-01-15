<!DOCTYPE html>
<html>
    <head>
        <title>Noticias</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Course CSS -->
        <link rel="stylesheet" type="text/css" href="../../css/css_card.css" media="screen" />
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
        require_once '../../clase/Conexion.php';
        require_once '../../clase/Noticia.php';
        session_start();
        $_SESSION['location'] = 'noticias';

        include '../encuadres/cabecera.php';
        ?>  
        <div class="container">
            <div class="row ">
                <div class="col-sm col-md col-lg">
                    <div class="breadcrumb">
                        <div class="breadcrumb-item"><a href="../../index.php">Home</a></div>
                        <div class="breadcrumb-item active">Noticias</div>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-sm col-md col-lg">
                    <div class="title h1 text-center">Noticias</div>
                </div>
            </div>            
            <div class="row ">
                <?php
                $n = Conexion::obtenerNoticia();
                foreach ($n as $key) {
                    ?>
                    <div class="col-sm col-md col-lg">
                        <!-- Card Start -->
                        <div class="card tam ml-3 mt-3 mb-3">
                            <div class="card-title">
                                <?php echo $key->getAsunto(); ?>
                            </div>
                            <div class="card-text">
                                <img class="card-img-top" src="data:image/jpeg;base64,<?php echo base64_encode($key->getFoto()); ?>" alt="foto usuario" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                                <label><?php echo $key->getUsuario(); ?></label> 
                                <h4><small><i>Posted on <?php echo $key->getFecha(); ?></i></small></h4>
                                <p><?php echo $key->getAsunto(); ?></p>
                                <p><?php echo $key->getDescripcion(); ?></p>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>
            <?php
            include '../encuadres/pie.php';
            ?>
    </body>
</html>