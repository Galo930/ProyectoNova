<?php
interface iGestor {
    public function obtenerTodos();
    public function guardar($nombre);
    public function eliminar($id);
}