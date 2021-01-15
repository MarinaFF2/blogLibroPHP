<?php

/**
 * Description of Libro
 *
 * @author daw207
 */
class Libro {

    /**
     * VARIABLES
     */
    private $isbn;
    private $nombre;
    private $autor;
    private $editorial;
    private $genero;
    private $descripcion;
    private $anioEdiccion;
    private $nPag;
    private $foto;
    private $activa;

    /**
     * CONSTRUCTOR DE LIBRO
     * @param type $isbn
     * @param type $nombre
     * @param type $autor
     * @param type $editorial
     * @param type $genero
     * @param type $descripcion
     * @param type $anioEdiccion
     * @param type $nPag
     * @param type $foto
     * @param type $activa
     */
    function __construct($isbn, $nombre, $autor, $editorial, $genero, $descripcion, $anioEdiccion, $nPag, $foto, $activa) {
        $this->isbn = $isbn;
        $this->nombre = $nombre;
        $this->autor = $autor;
        $this->editorial = $editorial;
        $this->genero = $genero;
        $this->descripcion = $descripcion;
        $this->anioEdiccion = $anioEdiccion;
        $this->nPag = $nPag;
        $this->foto = $foto;
        $this->activa = $activa;
    }

    /**
     * Get de isb
     * @return type
     */
    function getIsbn() {
        return $this->isbn;
    }

    /**
     * Get de nombre
     * @return type
     */
    function getNombre() {
        return $this->nombre;
    }

    /**
     * Get de Autor
     * @return type
     */
    function getAutor() {
        return $this->autor;
    }

    /**
     * Get de Editorial
     * @return type
     */
    function getEditorial() {
        return $this->editorial;
    }

    /**
     * Get de Genero
     * @return type
     */
    function getGenero() {
        return $this->genero;
    }

    /**
     * Get de Descripcion
     * @return type
     */
    function getDescripcion() {
        return $this->descripcion;
    }

    /**
     * Get de Año de Ediccion
     * @return type
     */
    function getAnioEdiccion() {
        return $this->anioEdiccion;
    }

    /**
     * Get de nº de paginas
     * @return type
     */
    function getNPag() {
        return $this->nPag;
    }

    /**
     * Get de foto
     * @return type
     */
    function getFoto() {
        return $this->foto;
    }

    function getActiva() {
        return $this->activa;
    }

    function setActiva($activa) {
        $this->activa = $activa;
    }

    /**
     * Set de foto
     * @param type $foto
     */
    function setFoto($foto) {
        $this->foto = $foto;
    }

    /**
     * Set de isbn
     * @param type $isbn
     */
    function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    /**
     * Set de nombre
     * @param type $nombre
     */
    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    /**
     * Set de autor
     * @param type $autor
     */
    function setAutor($autor) {
        $this->autor = $autor;
    }

    /**
     * Set de Editorial
     * @param type $editorial
     */
    function setEditorial($editorial) {
        $this->editorial = $editorial;
    }

    /**
     * Set de genero
     * @param type $genero
     */
    function setGenero($genero) {
        $this->genero = $genero;
    }

    /**
     * Set de  descripcion
     * @param type $descripcion
     */
    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    /**
     * Set de año de ediccion
     * @param type $anioEdiccion
     */
    function setAnioEdiccion($anioEdiccion) {
        $this->anioEdiccion = $anioEdiccion;
    }

    /**
     * Set de nº de paginas
     * @param type $nPag
     */
    function setNPag($nPag) {
        $this->nPag = $nPag;
    }

}
