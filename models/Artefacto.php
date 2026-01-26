<?php
class Artefacto extends EntidadEstelar implements iInteractuable{
    protected $antiguedad;
    public function __construct($id, $nombre, $planetaOrigen, $nivelEstabilidad, $antiguedad){
        parent::__construct($id, $nombre, $planetaOrigen, $nivelEstabilidad){
            $this->antiguedad = $antiguedad;
        }
    }
     public function reaccionar(){
        return "Reproduce un mensaje en una lengua muerta";
    }

}