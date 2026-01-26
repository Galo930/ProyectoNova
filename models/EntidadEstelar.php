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
}