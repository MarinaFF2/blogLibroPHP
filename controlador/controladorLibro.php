<?php

require_once '../clase/Conexion.php';
require_once '../clase/Libro.php';

session_start();

if (isset($_SESSION['u'])) {
    $u = $_SESSION['u'];
}

/*
 * se recogen los valores del formulario para añadir libro a la plataforma
 */
if (isset($_REQUEST['aniadirLibro'])) {
    $isbn = $_REQUEST['isbn'];
    $l = Conexion::existeLibro($isbn);
    if ($l == null) {
        $nombre = $_REQUEST['nombre'];
        $autor = $_REQUEST['autor'];
        $editorial = $_REQUEST['editorial'];
        $genero = $_REQUEST['genero'];
        $anioEdi = $_REQUEST['anioEdi'];
        $nPag = $_REQUEST['nPag'];
        $descripcion = $_REQUEST['descripcion'];
        Conexion::insertarLibro($isbn, $nombre, $autor, $editorial, $genero, $descripcion, $anioEdi, $nPag, 0);
        $size = getimagesize($_FILES['foto']['tmp_name']);
        if ($size !== false) {
            $imgg = $_FILES['foto']['tmp_name'];
            $foto = addslashes(file_get_contents($imgg));
            Conexion::ModificarFotoLibro($isbn, $foto);
            $f = getdate(); //fecha actual
            $fecha = $f[year] . '-' . $f[mon] . '-' . $f[mday];
            $correo = $u->getCorreo();
            $asunto = $nombre;
            $descripcion1 = 'Se ha registrado un nuevo libro';
            Conexion::insertarNoticia($correo, $asunto, $fecha, $descripcion1, $foto);
        }
        header('Location: ../vista/libro/areaLibros.php');
    }
}

//VALIDAR LIBROS
if (isset($_REQUEST['editar'])) {
    if ($_REQUEST['activado'] == true) {
        $activa = 1;
    } else {
        $activa = 0;
    }
    $isbn = $_REQUEST['isbn'];
    $nombre = $_REQUEST['nombre'];
    $autor = $_REQUEST['autor'];
    $editorial = $_REQUEST['editorial'];
    $genero = $_REQUEST['genero'];
    $anioEdi = $_REQUEST['anioEdi'];
    $nPag = $_REQUEST['nPag'];
    $descripcion = $_REQUEST['descripcion'];
    Conexion::ModificarLibro($isbn, $nombre, $autor, $editorial, $genero, $descripcion, $anioEdi, $nPag, $activa);
    $size = getimagesize($_FILES['foto']['tmp_name']);
    if ($size !== false) {
        $imgg = $_FILES['foto']['tmp_name'];
        $foto = addslashes(file_get_contents($imgg));
        Conexion::ModificarFotoLibro($isbn, $foto);
    }
    $_SESSION['totalLibro'] = Conexion::obtenerLibro();
    header('Location: ../vista/libro/validarLibros.php?pag=1');
}

if (isset($_REQUEST['eliminar'])) {
    $isbn = $_REQUEST['isbn'];
    Conexion::borrarLibro($isbn);
    header('Location: ../vista/libro/validarLibros.php?pag=1');
}

//FILTRAR POR 
if (isset($_REQUEST['filtrarA'])) {
    $letra = $_REQUEST['filtro'];
    $_SESSION['letra'] = $letra;
    $_SESSION['totalLibro'] = Conexion::obtenerAutor($letra);
    header('Location: ../vista/libro/porAutor.php?pag=1');
}
if (isset($_REQUEST['filtrarN'])) {
    $letra = $_REQUEST['filtro'];
    $_SESSION['letra'] = $letra;
    $_SESSION['totalLibro'] = Conexion::obtenerGenero($letra);
    header('Location: ../vista/libro/porNombre.php?pag=1');
}
if (isset($_REQUEST['filtrarG'])) {
    $letra = $_REQUEST['filtro'];
    $_SESSION['letra'] = $letra;
    $_SESSION['totalLibro'] = Conexion::obtenerGenero($letra);
    header('Location: ../vista/libro/porGenero.php?pag=1');
}