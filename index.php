<?php
require_once 'autoloader.php';
session_start();
$gestor = new Gestor();
$controller = new Controller($gestor);
$accion = $_GET['accion'] ?? 'index';
switch ($accion) {
    case 'crear':
        $controller->crear();
        break;
    case 'editar':
        $controller->editar();
        break;
    case 'eliminar':
        $controller->eliminar();
        break;
    case 'reaccionar':
        $controller->reaccionar();
        break;
    case 'index':
        $controller->index();
}