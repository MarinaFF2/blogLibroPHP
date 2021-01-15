<?php

require_once '../clase/Conexion.php';
require_once '../clase/Usuario.php';
require_once '../clase/Libro.php';

session_start();
if (isset($_SESSION['u'])) {
    $u = $_SESSION['u'];
}

//para iniciar sesion
if (isset($_REQUEST['aceptarInicioSesion'])) {
    if ($_REQUEST['correo'] != NULL and $_REQUEST['clave'] != NULL) {
        $correo = $_REQUEST['correo'];
        $pass = $_REQUEST['clave'];
        $passHash = md5($pass); //si esta bien codificada devuelve true
        $u = Conexion::existeUsuario($correo, $passHash);
        if ($u != null) {
            $_SESSION['u'] = $u;
            $_SESSION['location'] = 'usuarios';
            header('Location: ../index.php');
        }
    }
    $_SESSION['location'] = 'index';
    header('Location: ../index.php');
}

/*
 * Registrar a un usuario en nuestra plataforma
 */
if (isset($_REQUEST['registrar'])) {
    if ($_REQUEST['correo'] != NULL and $_REQUEST['nombre'] != NULL and $_REQUEST['apellido'] != NULL and $_REQUEST['edad'] != NULL and $_REQUEST['clave'] != NULL and $_REQUEST['reclave'] != NULL) {
        $correo = $_REQUEST['correo'];
        $pass = $_REQUEST['clave'];
        $rePass = $_REQUEST['reclave'];
        if (strcmp($pass, $rePass) == 0) {
            $passHash = md5($pass); //si esta bien codificada devuelve true
            $u = Conexion::existeUsu($correo);
            if ($u == null) {
                $nombre = $_REQUEST['nombre'];
                $apellido = $_REQUEST['apellido'];
                $edad = $_REQUEST['edad'];
                Conexion::insertarUsuarios($correo, $passHash, $nombre, $apellido, $edad, 0);
                Conexion::insertarRol($correo, $rol);
                $size = getimagesize($_FILES['foto']['tmp_name']);
                if ($size !== false) {
                    $imgg = $_FILES['foto']['tmp_name'];
                    $foto = addslashes(file_get_contents($imgg));
                    Conexion::ModificarFotoUsuario($correo, $foto);
                }
                $_SESSION['location'] = 'index';
                header('Location: ../index.php');
            }
        }
    }
    $_SESSION['location'] = 'index';
    header('Location: ../vista/usuario/registrarse.php');
}

/*
 * MODIFICACIONES DEL PERFIL
 */
if (isset($_REQUEST['modificarFoto'])) {
    $size = getimagesize($_FILES['foto']['tmp_name']);
    if ($size !== false) {
        $imgg = $_FILES['foto']['tmp_name'];
        $foto = addslashes(file_get_contents($imgg));
        Conexion::ModificarFotoUsuario($u->getCorreo(), $foto);
        $u = Conexion::existeUsu($u->getCorreo());
        $_SESSION['u'] = $u;
    }
    $_SESSION['location'] = 'usuarios';
    header('Location: ../vista/usuario/perfil.php');
}
if (isset($_REQUEST['modificarUsuario'])) {
    $correo = $_REQUEST['correo'];
    $nombre = $_REQUEST['nombre'];
    $apellido = $_REQUEST['apellido'];
    $edad = $_REQUEST['edad'];
    Conexion::ModificarUsuario($correo, $nombre, $apellido, $edad, $u->getActivo());
    if (!$_REQUEST['clave']) {
        $pass = $_REQUEST['clave'];
        $passHash = md5($pass);
        Conexion::ModificarUsuContra($correo, $passHash);
    }
    $u = Conexion::existeUsu($u->getCorreo());
    $_SESSION['u'] = $u;
    $_SESSION['location'] = 'usuarios';
    header('Location: ../vista/usuario/perfil.php');
}
/**
 * crudUsuario
 */
if (isset($_REQUEST['editar'])) {
    $correo = $_REQUEST['correo'];
    $nombre = $_REQUEST['nombre'];
    $apellido = $_REQUEST['apellido'];
    $edad = $_REQUEST['edad'];
    $activo = $_REQUEST['activo'];
    Conexion::ModificarUsuario($correo, $nombre, $apellido, $edad, $activo);
    $_SESSION['totalUsu'] = Conexion::obtenerUsuarios();
    header('Location: ../vista/usuario/crudUsuario.php?pag=1');
}
if (isset($_REQUEST['rol'])) {//cambiar de rol en el crud
    if (strcmp($_REQUEST['rol'], 'Usuario') == 0) { //pasa a ser administrador
        $correo = $_REQUEST['correo'];
        Conexion::ModificarRol(2, $correo);
        header('Location: ../vista/usuario/crudUsuario.php?pag=1');
    }
    if (strcmp($_REQUEST['rol'], 'Administrador') == 0) { //pasa aser usuario
        $correo = $_REQUEST['correo'];
        Conexion::ModificarRol(1, $correo);
        header('Location: ../vista/usuario/crudUsuario.php?pag=1');
    }
}
if (isset($_REQUEST['eliminar'])) {
    $correo = $_REQUEST['correo'];
    Conexion::borrarUsuario($correo);
    Conexion::borrarRol($correo);
    $_SESSION['totalUsu'] = Conexion::obtenerUsuarios();
    header('Location: ../vista/usuario/crudUsuario.php?pag=1');
}    