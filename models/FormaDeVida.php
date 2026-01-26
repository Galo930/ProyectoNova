<?php
class FormaDeVida extends EntidadEstelar implements iInteractuable{
    protected $dieta;

    public function __construct($id, $nombre, $planetaOrigen, $nivelEstabilidad, $dieta){
        parent::__construct($id, $nombre, $planetaOrigen, $nivelEstabilidad){
            $this->dieta = $dieta;
        }
    }

    public function reaccionar(){
        return "Emite pulso electromagnetico";
    }
}