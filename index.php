<?php
require_once 'autoloader.php';
session_start();
$gestor = new Gestor();
$controller = new Controller($gestor);
$accion = $_GET['action'] ?? 'index';
switch ($accion) {
    case 'crear':
        $controller->crear();
        break;
    case 'editar':
        $controller->editar();
        break;
    case 'index':
        $controller->index();
}