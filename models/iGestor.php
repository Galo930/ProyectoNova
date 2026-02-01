<?php
interface iGestor {
    public function obtenerTodos();
    public function guardar($elemento);
    public function eliminar($id);
}