<?php

/**
 * Description of Noticia
 *
 * @author daw207
 */
class Noticia {

    /**
     * VARIABLES
     */
    private $idNoticia;
    private $usuario;
    private $asunto;
    private $fecha;
    private $descripcion;
    private $foto;

    /**
     * CONSTRUCTOR DE NOTICIAS
     * @param type $idNoticia
     * @param type $usuario
     * @param type $asunto
     * @param type $fecha
     * @param type $descripcion
     * @param type $foto
     */
    function __construct($idNoticia, $usuario, $asunto, $fecha, $descripcion, $foto) {
        $this->idNoticia = $idNoticia;
        $this->usuario = $usuario;
        $this->asunto = $asunto;
        $this->fecha = $fecha;
        $this->descripcion = $descripcion;
        $this->foto = $foto;
    }

    /**
     * GETTERS AND SETTERS
     */
    function getIdNoticia() {
        return $this->idNoticia;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getAsunto() {
        return $this->asunto;
    }

    function getFoto() {
        return $this->foto;
    }
    
    function setFoto($foto) {
        $this->foto = $foto;
    }

    function setAsunto($asunto) {
        $this->asunto = $asunto;
    }

    function setIdNoticia($idNoticia) {
        $this->idNoticia = $idNoticia;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

}
