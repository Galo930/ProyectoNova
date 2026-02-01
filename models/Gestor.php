<?php
class Gestor{
    public function __construct(){
        if (!isset($_SESSION ['Elemento'])){
            $_SESSION['Elemento'] = [];
        }
    }
    public function obtenerTodos(){
        return $_SESSION['Elemento'];
    }
    public function guardar($entidad){
        $_SESSION['Elemento'][] = $entidad;
    }
    public function buscar($id){
        foreach ($_SESSION['Elemento'] as $elemento){
            if ($elemento->getid()==$id){
                return $elemento;
            }
        }
        return null;
    }
    public function editar($id, $nombre, $planetaOrigen, $nivelEstabilidad, $antiguedad="", $dureza="", $dieta="" ){
        foreach ($_SESSION['Elemento'] as $elemento){
            if ($elemento->getId()==$id){
                $elemento->setId($id);
                $elemento->setNombre($nombre);
                $elemento->setplanetaOrigen($planetaOrigen);
                $elemento->setnivelEstabilidad($nivelEstabilidad);
                if ($elemento instanceof Artefacto){
                    $elemento->setAntiguedad($antiguedad);
                } elseif ($elemento instanceof MineralRaro){
                    $elemento->setDureza($dureza);
                } elseif ($elemento instanceof FormaDeVida){
                    $elemento->setDieta($dieta);
                }

            }
        }
    }
    public function eliminar($id){
        foreach ($_SESSION['Elemento'] as $i => $elemento){
            if($elemento->getId()==$id){
                unset($_SESSION['Elemento'][$i]);
                $_SESSION['Elemento']=array_values($_SESSION['Elemento']);
            }
        }
    }
}