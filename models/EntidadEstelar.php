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
        $this->nivelEstabilidad;
        $this->validarEstabilidad($nivelEstabilidad);
    }
     public function validarEstabilidad($nivelEstabilidad) {
        if ($nivelEstabilidad > 10) || ($nivelEstabilidad < 0) {
            echo ("Error: Nivel de peligrosidad superior a 10.");
        }
    }

    public function getId() { 
        return $this->id;
    }
    public function getNombre() { 
        return $this->nombre;
    }
    public function getPlanetaOrigen() { 
        return $this->planetaOrigen;
    }   
    public function getNivelEstabilidad() { 
        return $this->nivelEstabilidad;
    }

    public function setid($id) { 
        $this->id = $id;
    }
    public function setNombre($nombre) { 
        $this->nombre = $nombre;
    }
    public function setPlanetaOrigen($planetaOrigen) { 
        $this->planetaOrigen = $planetaOrigen;
    }
    public function setNivelEstabilidad($nivelEstabilidad) { 
        $this->nivelEstabilidad = $nivelEstabilidad;
    }
}