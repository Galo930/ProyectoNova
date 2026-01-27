<?php
// helpers/session_helper.php

function iniciarSesionSegura() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Inicializar el contenedor de datos si es la primera vez [cite: 26]
    if (!isset($_SESSION['Entidades'])) {
        $_SESSION['Entidades'] = [];
    }
}