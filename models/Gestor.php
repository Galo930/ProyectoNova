<?php
class Gestor implements iGestor{
    public function obtenerTodos(){

    }
    public function guardar()
    public function eliminar($id){
            if ($e->getId() == $id) {
                unset($_SESSION['Entidad'][$i]);
                $_SESSION['Entidad'] = array_values($_SESSION['Entidad']);
                return true;
            }
    }
}
