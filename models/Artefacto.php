<?php
class Artefacto extends EntidadEstelar{
    protected $antiguedad;
    public function __construct($id, $nombre, $planetaOrigen, $nivelEstabilidad, $antiguedad){
        parent::__construct($id, $nombre, $planetaOrigen, $nivelEstabilidad){
            $this->antiguedad = $antiguedad;
        }
    }
}