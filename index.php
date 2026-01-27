<?php
// index.php

// 1. Cargar el helper y arrancar sesión
require_once 'helpers/session_helper.php';
iniciarSesionSegura();

// 2. Cargar interfaces y clases (Modelos) [cite: 44, 45]
require_once 'models/iInteractuable.php';
require_once 'models/iGestor.php';
require_once 'models/EntidadEstelar.php';
require_once 'models/FormaDeVida.php';
require_once 'models/MineralRaro.php';
require_once 'models/Artefacto.php';
require_once 'models/Gestor.php';

// 3. Cargar el Controlador [cite: 42]
require_once 'controllers/Controller.php';

// 4. Inyección de Dependencias (Gestor -> Controlador) 
$gestor = new Gestor();
$controller = new Controller($gestor);

// 5. Lógica de navegación (Router básico) 
$action = $_GET['action'] ?? 'explorar';

if ($action === 'registrar') {
    include 'views/Registrar.php';
} elseif ($action === 'guardar') {
    $controller->guardar();
} elseif ($action === 'eliminar') {
    $controller->eliminar();
} else {
    // Por defecto, vamos al Explorador (Read) [cite: 35]
    $controller->explorar();
}