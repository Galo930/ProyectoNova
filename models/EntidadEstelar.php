<?php
abstract class EntidadEstelar{
    protected $id;
    protected $nombre;
    protected $planetaOrigen;
    protected $nivelEstabilidad;

    public function __construct($id, $nombre, $planetaOrigen, $nivelEstabilidad) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->planetaOrigen= $planetaOrigen;
        $this->nivelEstabilidad = $nivelEstabilidad;
    }

    abstract public function reaccionar();

    public function getId() { 
        return $this->id;
    }
    public function getNombre() { 
        return $this->nombre;
    }
    public function getplanetaOrigen() { 
        return $this->planetaOrigen;
    }   
    public function getnivelEstabilidad() { 
        return $this->nivelEstabilidad;
    }

    public function setId($id) { 
        $this->id = $id;
    }
    public function setNombre($nombre) { 
        $this->nombre = $nombre;
    }
    public function setplanetaOrigen($planetaOrigen) { 
        $this->planetaOrigen = $planetaOrigen;
    }
    public function setnivelEstabilidad($nivelEstabilidad) { 
        $this->nivelEstabilidad = $nivelEstabilidad;
    }
}