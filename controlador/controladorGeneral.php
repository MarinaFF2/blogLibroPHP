<?php

require_once '../clase/Email.php';
require_once '../clase/Usuario.php';
require_once '../clase/Conexion.php';
require_once '../clase/Libro.php';

session_start();

if (isset($_SESSION['u'])) {
    $u = $_SESSION['u'];
}

//cuando has olvidado la contraseña
if (isset($_REQUEST['botOlvidoPwd'])) {
    $para = $_REQUEST['email'];
    Email::enviarCorreo($para);
    header("Location: ../vista/usuario/inicioSesion.php");
}
//redirige al iniciar sesion
if (isset($_REQUEST['iniciarSesion'])) {
    header("Location: ../vista/usuario/inicioSesion.php");
}
//redirige al perfil del usuario
if (isset($_REQUEST['perfil'])) {
    header('Location: ../vista/usuario/perfil.php');
}
//redirige a añadir libro
if (isset($_REQUEST['aniadirLibro'])) {
    header('Location: ../vista/libro/aniadirLibros.php');
}
//redirige a añadir libro
if (isset($_REQUEST['validarLibro'])) {
    $_SESSION['totalLibro'] = Conexion::obtenerLibro();
    header('Location: ../vista/libro/validarLibros.php?pag=1');
}
//volver al index
if (isset($_REQUEST['volverIndex'])) {
    header('Location: ../index.php');
}
//cierra sesion
if (isset($_REQUEST['cerrarSesion'])) {
    session_destroy();
    header('Location: ../index.php');
}

if (isset($_REQUEST['aniadirNoticia'])) {
    $foto = addslashes(file_get_contents($_REQUEST['fotoUsuario']));
    $f = getdate(); //fecha actual
    $fecha = $f[year] . '-' . $f[mon] . '-' . $f[mday];
    $correo = $u->getCorreo();
    $asunto = $_REQUEST['asuntoNoticia'];
    $descripcion = $_REQUEST['descripcionNoticia'];
    Conexion::insertarNoticia($correo, $asunto, $fecha, $descripcion, $foto);
//    $_SESSION['totalNoticia'] = Conexion::obtenerNoticia();
    
    header('Location: ../vista/noticia/noticias.php');
}