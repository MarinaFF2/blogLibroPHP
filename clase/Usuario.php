<?php

/**
 * Description of Usuario
 *
 * @author daw207
 */
class Usuario {

    /**
     * Variables
     */
    private $correo;
    private $clave;
    private $nombre;
    private $apellido;
    private $rol;
    private $edad;
    private $foto;
    private $activo;

    /**
     * Constructor de Usuario
     * @param type $correo
     * @param type $clave
     * @param type $nombre
     * @param type $apellido
     * @param type $rol
     * @param type $edad
     * @param type $foto
     * @param type $activo
     */
    function __construct($correo, $clave, $nombre, $apellido, $rol, $edad, $foto, $activo) {
        $this->correo = $correo;
        $this->clave = $clave;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->rol = $rol;
        $this->edad = $edad;
        $this->foto = $foto;
        $this->activo = $activo;
    }

    /**
     * Get de correo/usuario
     * @return type
     */
    function getCorreo() {
        return $this->correo;
    }

    /**
     * Get de clave
     * @return type
     */
    function getClave() {
        return $this->clave;
    }

    /**
     * Get de nombre
     * @return type
     */
    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    /**
     * Get de rol
     * @return type
     */
    function getRol() {
        return $this->rol;
    }

    /**
     * Get de edad
     * @return type
     */
    function getEdad() {
        return $this->edad;
    }

    /**
     * Get de foto
     * @return type
     */
    function getFoto() {
        return $this->foto;
    }

    function getActivo() {
        return $this->activo;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

    /**
     * Set de foto
     * @param type $foto
     */
    function setFoto($foto) {
        $this->foto = $foto;
    }

    /**
     * Set de edad
     * @param type $edad
     */
    function setEdad($edad) {
        $this->edad = $edad;
    }

    /**
     * Set de correo/usuario
     * @param type $correo
     */
    function setCorreo($correo) {
        $this->correo = $correo;
    }

    /**
     * Set de clave
     * @param type $clave
     */
    function setClave($clave) {
        $this->clave = $clave;
    }

    /**
     * set de nombre
     * @param type $nombre
     */
    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    /**
     * Set de apellido
     * @param type $apellido
     */
    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    /**
     * Set de Rol
     * @param type $rol
     */
    function setRol($rol) {
        $this->rol = $rol;
    }

}
