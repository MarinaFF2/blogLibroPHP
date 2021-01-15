<?php

require_once 'Libro.php';
require_once 'Constantes.php';
require_once 'Usuario.php';

/**
 * Description of Constantes
 *
 * @author Marina Flores Fernandez
 */
class Conexion {

    private static $conexion;

    static function abrirBD() {
        /* Abrir la conexión */
        try {
            self::$conexion = new mysqli('localhost', Constantes::$usuario, Constantes::$password, Constantes::$BBDD);
        } catch (Exception $e) {
            echo 'Error de conexion';
        }
    }

    static function cerrarBD() {
        /* Cerrar la conexión */
        self::$conexion->close();
    }

    /**
     * CLASE USUARIOS
     */

    /**
     * Metodo para obtener un usuario para comprobar que exite
     * con el correo y contraseña para el incio de sesion
     * @return \Usuario
     */
    static function existeUsuario($correo, $pwd) {
        self::abrirBD();
        $u = null;
        $stmt = self::$conexion->prepare("SELECT usuario.correo, usuario.pwd, usuario.nombre, usuario.apellido, asignarrol.idRol, usuario.edad, usuario.foto , usuario.activo FROM usuario,asignarrol where usuario.correo=? and usuario.pwd=? and asignarrol.usuario=usuario.correo");
        $stmt->bind_param('ss', $correo, $pwd);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($fila = $result->fetch_assoc()) {
                if (!empty($fila)) {
                    $u = new Usuario($fila['correo'], $fila['pwd'], $fila['nombre'], $fila['apellido'], $fila['idRol'], $fila['edad'], $fila['foto'], $fila['activo']);
//                    $u = new Usuario($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6]);
                }
            }
        } else {
            echo 'fallo';
        }
        $stmt->close();
        self::cerrarBD();
        return $u;
    }

    /**
     * Metodo para obtener un usuario para comprobar que exite
     * solo con el correo
     * @return \Usuario
     */
    static function existeUsu($correo) {
        self::abrirBD();
        $u = null;
        $stmt = self::$conexion->prepare('SELECT usuario.correo, usuario.pwd, usuario.nombre, usuario.apellido, asignarrol.idRol, usuario.edad, usuario.foto , usuario.activo FROM usuario, asignarrol where usuario.correo= ? and asignarrol.usuario= usuario.correo');
        $stmt->bind_param('s', $correo);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($fila = $result->fetch_assoc()) {
                if (!empty($fila)) {
                    $u = new Usuario($fila['correo'], $fila['pwd'], $fila['nombre'], $fila['apellido'], $fila['idRol'], $fila['edad'], $fila['foto'], $fila['activo']);
//                    $u = new Usuario($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6]);
                }
            }
        } else {
            echo 'fallo';
        }
        $stmt->close();
        self::cerrarBD();
        return $u;
    }

    /**
     * Metodo para obtener una lista de array con la clase usuario
     * @return \Usuario
     */
    static function obtenerUsuarios() {
        self::abrirBD();
        $stmt = self::$conexion->prepare('SELECT usuario.correo, usuario.pwd, usuario.nombre, usuario.apellido, asignarrol.idRol, usuario.edad, usuario.foto , usuario.activo FROM usuario,asignarrol where asignarrol.usuario=usuario.correo');
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                while ($fila = $result->fetch_assoc()) {
                    $u = new Usuario($fila['correo'], $fila['pwd'], $fila['nombre'], $fila['apellido'], $fila['idRol'], $fila['edad'], $fila['foto'], $fila['activo']);
                    $v[] = $u;
                }
            }
        } else {
            echo 'fallo';
        }
        $stmt->close();
        self::cerrarBD();
        return $v;
    }

    /**
     * Metodo para obtener una lista de array con la clase usuario
     * @return \Usuario
     */
    static function obtenerUsuariosLimit($ini) {
        self::abrirBD();
        $stmt = self::$conexion->prepare('SELECT usuario.correo, usuario.pwd, usuario.nombre, usuario.apellido, asignarrol.idRol, usuario.edad, usuario.foto , usuario.activo FROM usuario,asignarrol where asignarrol.usuario=usuario.correo LIMIT ' . $ini . ',4');
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                while ($fila = $result->fetch_assoc()) {
                    $u = new Usuario($fila['correo'], $fila['pwd'], $fila['nombre'], $fila['apellido'], $fila['idRol'], $fila['edad'], $fila['foto'], $fila['activo']);
                    $v[] = $u;
                }
            }
        } else {
            echo 'fallo';
        }
        $stmt->close();
        self::cerrarBD();
        return $v;
    }

    /**
     * METODO INSERTAR USUARIO
     * @param type $correo
     * @param type $pwd
     * @param type $nombre
     * @param type $apellido
     * @param type $edad
     */
    static function insertarUsuarios($correo, $pwd, $nombre, $apellido, $edad) {
        self::abrirBD();
        $stmt = self::$conexion->prepare('INSERT INTO usuario (correo, pwd, nombre, apellido, edad,activo) VALUES (?,?,?,?,?,0)');
        $stmt->bind_param("ssssi", $correo, $pwd, $nombre, $apellido, $edad);
// set parameters and execute
        $stmt->execute();
        $stmt->close();
        self::cerrarBD();
    }

    /**
     * METODO MODIFICAR USUARIO
     * @param type $correo
     * @param type $pwd
     * @param type $nombre
     * @param type $apellido
     * @param type $edad 
     * @param type $activo
     */
    static function ModificarUsuario($correo, $nombre, $apellido, $edad, $activo) {
        self::abrirBD();
        $stmt = self::$conexion->prepare('UPDATE usuario SET nombre=?, apellido=?, edad=?, activo=? where correo=?');
        $stmt->bind_param("ssiis", $nombre, $apellido, $edad, $activo, $correo);
        $stmt->execute();
        $stmt->close();
        self::cerrarBD();
    }

    /**
     * Metodo para modificar la foto del usuario
     * @param type $correo
     * @param type $foto
     */
    static function ModificarFotoUsuario($correo, $foto) {
        self::abrirBD();
        $stmt = self::$conexion->prepare("UPDATE usuario SET foto='" . $foto . "' WHERE correo='" . $correo . "'");
        $stmt->execute();
        $stmt->close();
        self::cerrarBD();
    }

    /**
     * METODO MODIFICAR USUARIO
     * @param type $correo
     * @param type $pwd
     * @param type $nombre
     * @param type $apellido
     */
    static function ModificarUsuContra($correo, $pwd) {
        self::abrirBD();
        $stmt = self::$conexion->prepare('UPDATE usuario SET pwd=? where correo=?');
        $stmt->bind_param("ss", $pwd, $correo);
        $stmt->execute();
        $stmt->close();
        self::cerrarBD();
    }

    /**
     * BORRAR USUARIO   
     * @param type $correo
     */
    static function borrarUsuario($correo) {
        self::abrirBD();
        $stmt = self::$conexion->prepare('DELETE FROM usuario WHERE correo=?');
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $stmt->close();
        self::cerrarBD();
    }

    /**
     * CLASE ROL
     */

    /**
     * METODO INSERTAR ROL
     * @param type $correo
     * @param type $rol
     */
    static function insertarRol($correo) {
        self::abrirBD();
        $stmt = self::$conexion->prepare('INSERT INTO asignarrol (idAsignarRol, usuario, idRol) VALUES (0,?,1)');
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $stmt->close();
        self::cerrarBD();
    }

    /**
     * Metodo modificar rol
     * @param type $idAsignarRol
     * @param type $rol
     * @param type $correo
     */
    static function ModificarRol($rol, $correo) {
        self::abrirBD();
        $stmt = self::$conexion->prepare('UPDATE asignarrol SET idRol=? WHERE usuario=?');
        $stmt->bind_param("is", $rol, $correo);
        $stmt->execute();
        $stmt->close();
        self::cerrarBD();
    }

    /**
     * BORRAR ROL
     * @param type $correo
     */
    static function borrarRol($correo) {
        self::abrirBD();
        $stmt = self::$conexion->prepare('DELETE FROM asignarrol WHERE usuario = ?');
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $stmt->close();
        self::cerrarBD();
    }

    /**
     * CLASE LIBRO
     */

    /**
     * Metodo para obtener un libro y comprobar que exite
     * @return \Libro
     */
    static function existeLibro($isbn) {
        self::abrirBD();
        $l = null;
        $stmt = self::$conexion->prepare('SELECT * From libro where ISBN= ?');
        $stmt->bind_param('s', $isbn);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($fila = $result->fetch_assoc()) {
            if (!empty($fila)) {
                $l = new Libro($fila['ISBN'], $fila['nombre'], $fila['autor'], $fila['editorial'], $fila['genero'], $fila['descripcion'], $fila['anioEdiccion'], $fila['nPag'], $fila['foto'], $fila['activa']);
            }
        }
        $stmt->close();
        self::cerrarBD();
        return $l;
    }

    /**
     * METODO INSERTAR LIBRO
     * @param type $isbn
     * @param type $nombre
     * @param type $autor
     * @param type $editorial
     * @param type $genero
     * @param type $descripcion
     * @param type $anioEdiccion
     * @param type $nPag
     */
    static function insertarLibro($isbn, $nombre, $autor, $editorial, $genero, $descripcion, $anioEdiccion, $nPag, $activa) {
        self::abrirBD();
//        $stmt = self::$conexion->prepare("INSERT INTO libro (ISBN,nombre,autor,editorial,genero,descripcion,anioEdiccion,nPag,activa) VALUES ('" . $isb . "', '" . $nombre . "', '" . $autor . "', '" . $editorial . "', '" . $genero . "', '" . $descripcion . "', '" . $anioEdiccion . "', '" . $nPag . ",' " . $activa . "' )");
        $stmt = self::$conexion->prepare('INSERT INTO libro (ISBN,nombre,autor,editorial,genero,descripcion,anioEdiccion,nPag,activa) VALUES (?,?,?,?,?,?,?,?,?)');
        $stmt->bind_param("ssssssiii", $isbn, $nombre, $autor, $editorial, $genero, $descripcion, $anioEdiccion, $nPag, $activa);
        $stmt->execute();
        $stmt->close();
        self::cerrarBD();
    }

    /**
     * Metodo para modificar la foto del libro
     * @param type $isb
     * @param type $foto
     */
    static function ModificarFotoLibro($isb, $foto) {
        self::abrirBD();
        $stmt = self::$conexion->prepare("UPDATE libro  SET foto='" . $foto . "'  WHERE ISBN='" . $isb . "'");
        $stmt->execute();
        $stmt->close();
        self::cerrarBD();
    }

//    static function obtenerNom() {
//        self::abrirBD();
//        $l = null;
//        $stmt = self::$conexion->prepare('SELECT DISTINC LEFT(nombre,1) as f FROM libro WHERE activa=1');
//        if ($stmt->execute()) {
//            $result = $stmt->get_result();
//            if ($result->num_rows > 0) {
//                while ($fila = $result->fetch_assoc()) {
//                    $v[] = $fila['f'];
//                }
//            }
//            $stmt->close();
//            self::cerrarBD();
//            return $v;
//        }
//    }
//    static function obtenerAut() {
//        self::abrirBD();
//        $l = null;
//        $stmt = self::$conexion->prepare('SELECT DISTINC LEFT(autor,1) as i FROM libro WHERE activa=1');
//        if ($stmt->execute()) {
//            $result = $stmt->get_result();
//            if ($result->num_rows > 0) {
//                while ($fila = $result->fetch_assoc()) {
//                    $v[] = $fila['i'];
//                }
//            }
//            $stmt->close();
//            self::cerrarBD();
//            return $v;
//        }
//    }
//    static function obtenerGen() {
//        self::abrirBD();
//        $l = null;
//        $stmt = self::$conexion->prepare('SELECT DISTINC LEFT(genero,1) as i FROM libro WHERE activa=1');
//        if ($stmt->execute()) {
//            $result = $stmt->get_result();
//            if ($result->num_rows > 0) {
//                while ($fila = $result->fetch_assoc()) {
//                    $v[] = $fila['i'];
//                }
//            }
//            $stmt->close();
//            self::cerrarBD();
//            return $v;
//        }
//    }
    /**
     * Metodo para obtener una lista de array con la clase Libro
     * @return \Libro
     */
    static function obtenerLibro() {
        self::abrirBD();
        $l = null;
        $stmt = self::$conexion->prepare('SELECT * FROM libro');
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $l = new Libro($fila['ISBN'], $fila['nombre'], $fila['autor'], $fila['editorial'], $fila['genero'], $fila['descripcion'], $fila['anioEdiccion'], $fila['nPag'], $fila['foto'], $fila['activa']);
                $v[] = $l;
            }
        }
        $stmt->close();
        self::cerrarBD();
        return $v;
    }

    /**
     * Metodo para obtener una lista de array con la clase Libro
     * @return \Libro
     */
    static function obtenerLibroLimit($ini) {
        self::abrirBD();
        $l = null;
        $stmt = self::$conexion->prepare('SELECT * FROM libro LIMIT ' . $ini . ',3');
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $l = new Libro($fila['ISBN'], $fila['nombre'], $fila['autor'], $fila['editorial'], $fila['genero'], $fila['descripcion'], $fila['anioEdiccion'], $fila['nPag'], $fila['foto'], $fila['activa']);
                $v[] = $l;
            }
        }
        $stmt->close();
        self::cerrarBD();
        return $v;
    }

    /**
     * Metodo para obtener una lista de array por nombre con la clase Libro
     * @return \Libro
     */
    static function obtenerPorNombreLimit($ini) {
        self::abrirBD();
        $l = null;
        $stmt = self::$conexion->prepare('SELECT * FROM libro WHERE activa=1 ORDER BY nombre desc LIMIT ' . $ini . ',3');
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                while ($fila = $result->fetch_assoc()) {
                    $l = new Libro($fila['ISBN'], $fila['nombre'], $fila['autor'], $fila['editorial'], $fila['genero'], $fila['descripcion'], $fila['anioEdiccion'], $fila['nPag'], $fila['foto'], $fila['activa']);
                    $v[] = $l;
                }
            }
            $stmt->close();
            self::cerrarBD();
            return $v;
        }
    }

    /**
     * Metodo para obtener una lista de array por genero con la clase Libro
     * @return \Libro
     */
    static function obtenerPorGeneroLimit($ini) {
        self::abrirBD();
        $l = null;
        $stmt = self::$conexion->prepare('SELECT * FROM libro WHERE activa=1 ORDER BY genero desc  LIMIT ' . $ini . ',3');
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $l = new Libro($fila['ISBN'], $fila['nombre'], $fila['autor'], $fila['editorial'], $fila['genero'], $fila['descripcion'], $fila['anioEdiccion'], $fila['nPag'], $fila['foto'], $fila['activa']);
                $v[] = $l;
            }
        }
        $stmt->close();
        self::cerrarBD();
        return $v;
    }

    static function obtenerNombre($letra) {
        self::abrirBD();
        $stmt = self::$conexion->prepare("SELECT nombre FROM libro WHERE activa=1 AND  nombre like '" . $letra . "%' ORDER BY nombre desc");
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $v[] = $fila['nombre'];
            }
        }
        $stmt->close();
        self::cerrarBD();
        return $v;
    }

    static function obtenerNombreLimit($ini, $letra) {
        self::abrirBD();
        $stmt = self::$conexion->prepare("SELECT * FROM libro WHERE activa=1 AND  nombre like '" . $letra . "%' ORDER BY nombre desc LIMIT " . $ini . ",3");
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $l = new Libro($fila['ISBN'], $fila['nombre'], $fila['autor'], $fila['editorial'], $fila['genero'], $fila['descripcion'], $fila['anioEdiccion'], $fila['nPag'], $fila['foto'], $fila['activa']);
                $v[] = $l;
            }
        }
        $stmt->close();
        self::cerrarBD();
        return $v;
    }

    static function obtenerGenero($letra) {
        self::abrirBD();
        $stmt = self::$conexion->prepare("SELECT genero FROM libro WHERE activa=1 AND  genero like '" . $letra . "%' ORDER BY genero desc");
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $v[] = $fila['genero'];
            }
        }
        $stmt->close();
        self::cerrarBD();
        return $v;
    }

    static function obtenerGeneroLimit($ini, $letra) {
        self::abrirBD();
        $stmt = self::$conexion->prepare("SELECT * FROM libro WHERE activa=1 AND  genero like '" . $letra . "%' ORDER BY genero desc LIMIT " . $ini . ",3");
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $l = new Libro($fila['ISBN'], $fila['nombre'], $fila['autor'], $fila['editorial'], $fila['genero'], $fila['descripcion'], $fila['anioEdiccion'], $fila['nPag'], $fila['foto'], $fila['activa']);
                $v[] = $l;
            }
        }
        $stmt->close();
        self::cerrarBD();
        return $v;
    }

    static function obtenerAutor($letra) {
        self::abrirBD();
        $v = null;
        $stmt = self::$conexion->prepare("SELECT autor FROM libro WHERE activa=1 AND  autor like '" . $letra . "%' ORDER BY autor desc");
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $v[] = $fila['autor'];
            }
        }
        $stmt->close();
        self::cerrarBD();
        return $v;
    }

    static function obtenerAutorLimit($ini, $letra) {
        self::abrirBD();
        $stmt = self::$conexion->prepare("SELECT * FROM libro WHERE activa=1 AND  autor like '" . $letra . "%' ORDER BY autor desc LIMIT " . $ini . ",3");
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $l = new Libro($fila['ISBN'], $fila['nombre'], $fila['autor'], $fila['editorial'], $fila['genero'], $fila['descripcion'], $fila['anioEdiccion'], $fila['nPag'], $fila['foto'], $fila['activa']);
                $v[] = $l;
            }
        }
        $stmt->close();
        self::cerrarBD();
        return $v;
    }

    /**
     * Metodo para obtener una lista de array por autor con la clase Libro
     * @return \Libro
     */
    static function obtenerPorAutorLimit($ini) {
        self::abrirBD();
        $l = null;
        $stmt = self::$conexion->prepare('SELECT * FROM libro WHERE activa=1  ORDER BY autor desc LIMIT ' . $ini . ',3');
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $l = new Libro($fila['ISBN'], $fila['nombre'], $fila['autor'], $fila['editorial'], $fila['genero'], $fila['descripcion'], $fila['anioEdiccion'], $fila['nPag'], $fila['foto'], $fila['activa']);
                $v[] = $l;
            }
        }
        $stmt->close();
        self::cerrarBD();
        return $v;
    }

    /**
     * METODO MODIFICAR LIBRO
     * @param type $isbn
     * @param type $nombre
     * @param type $autor
     * @param type $editorial
     * @param type $genero
     * @param type $descripcion
     * @param type $anioEdiccion
     * @param type $nPag
     */
    static function ModificarLibro($isbn, $nombre, $autor, $editorial, $genero, $descripcion, $anioEdiccion, $nPag, $activa) {
        self::abrirBD();
        $sql = "UPDATE libro SET nombre='" . $nombre . "', autor='" . $autor . "', editorial='" . $editorial . "', genero='" . $genero . "', descripcion='" . $descripcion . "', anioEdiccion=" . $anioEdiccion . ", nPag=" . $nPag . ", activa=" . $activa . " WHERE ISBN='" . $isbn . "'";
        $stmt = self::$conexion->prepare($sql);
//        $stmt = self::$conexion->prepare('UPDATE libro SET nombre=?,autor=?,editorial=?,genero=?,descripcion=?,anioEdiccion=?,nPag=?,activa=? WHERE ISBN=?');
//        $stmt->bind_param("sssssiiis", $nombre, $autor, $editorial, $genero, $descripcion, $anioEdiccion, $nPag, $activa, $isbn);
        $stmt->execute();
        $stmt->close();
        self::cerrarBD();
    }

    /**
     * BORRAR RANKING  
     * @param type $isbn
     */
    static function borrarLibro($isbn) {
        self::abrirBD();
        $stmt = self::$conexion->prepare('DELETE FROM libro WHERE ISBN= ?');
        $stmt->bind_param("s", $isbn);
        $stmt->execute();
        $stmt->close();
        self::cerrarBD();
    }

    /**
     * CLASE Noticia
     */

    /**
     * Metodo para obtener una lista de array con la clase Noticia
     * @return \Noticia
     */
    static function obtenerNoticia() {
        self::abrirBD();
        $stmt = self::$conexion->prepare('SELECT * FROM noticia');
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $n = new Noticia($fila['idNoticia'], $fila['usuario'], $fila['asunto'], $fila['fecha'], $fila['descripcion'], $fila['foto']);
                $v[] = $n;
            }
        }
        $stmt->close();
        self::cerrarBD();
        return $v;
    }

    /**
     * Metodo para obtener una lista de array con la clase Noticia
     * @return \Noticia
     */
    static function obtenerNoticiaLimit($ini) {
        self::abrirBD();
        $stmt = self::$conexion->prepare('SELECT * FROM noticia LIMIT ' . $ini . ',4');
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $n = new Noticia($fila['idNoticia'], $fila['usuario'], $fila['asunto'], $fila['fecha'], $fila['descripcion'], $fila['foto']);
                $v[] = $n;
            }
        }
        $stmt->close();
        self::cerrarBD();
        return $v;
    }

    /**
     * Metodo para modificar las fotos de las noticias
     * @param type $idNoticia
     * @param type $foto
     */
    static function ModificarFotosNoticia($idNoticia, $foto) {
        self::abrirBD();
        $stmt = self::$conexion->prepare("UPDATE noticia SET foto = '" . $foto . "' WHERE idNoticia = " . $idNoticia);
        $stmt->execute();
        $stmt->close();
        self::cerrarBD();
    }

    /**
     *  METODO INSERTAR Noticia
     * @param type $correo
     * @param type $asunto
     * @param type $fecha
     * @param type $descripcion
     */
    static function insertarNoticia($correo, $asunto, $fecha, $descripcion, $foto) {
        self::abrirBD();
        $stmt = self::$conexion->prepare("INSERT INTO noticia (idNoticia, usuario, asunto, fecha, descripcion, foto) VALUES (0, '" . $correo . "', '" . $asunto . "', '" . $fecha . "', '" . $descripcion . "', '" . $foto . "' )");
        $stmt->execute();
        $stmt->close();
        self::cerrarBD();
    }

    /**
     * BORRAR NOTICIA
     * @param type $correo
     * @param type $idNoticia
     */
    static function borrarNoticia($idNoticia) {
        self::abrirBD();
        $stmt = self::$conexion->prepare('DELETE FROM noticia WHERE idNoticia=?');
        $stmt->bind_param("i", $idNoticia);
        $stmt->execute();
        $stmt->close();
        self::cerrarBD();
    }

}
