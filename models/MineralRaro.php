<?php
class MineralRaro extends EntidadEstelar{
    protected $dureza;
    public function __construct($id, $nombre, $planetaOrigen, $nivelEstabilidad, $dureza){
        parent::__construct($id, $nombre, $planetaOrigen, $nivelEstabilidad){
            $this->dureza = $dureza;
        }
    }
     public function reaccionar(){
        return "Brilla con intensidad azulada";
    }
}