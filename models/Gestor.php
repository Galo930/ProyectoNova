<?php
class Gestor implements iGestor{
    public function obtenerTodos(){
        return $_SESSION['Entidades'];
    }
    
    public function guardar($entidad){
        $_SESSION['Entidades'][] = $entidad;
        return true;
    }

    public function eliminar($id){
        foreach ($_SESSION['Entidades'] as $i => $e) {
   
            if ($e->getId() == $id) {
                unset($_SESSION['Entidades'][$i]);
                
                $_SESSION['Entidades'] = array_values($_SESSION['Entidades']);
                return true;
            }
        }
        return false; 
    }
}
