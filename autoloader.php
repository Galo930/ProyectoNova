<?php
spl_autoload_register(function ($class) {
    // Definimos las carpetas donde buscar
    $paths = ['models', 'controllers'];

    foreach ($paths as $path) {
        // Usamos DIRECTORY_SEPARATOR para compatibilidad entre Windows/Linux
        $file = __DIR__ . DIRECTORY_SEPARATOR . $path . DIRECTORY_SEPARATOR . $class . '.php';
        
        if (file_exists($file)) {
            require_once $file;
            return; // Importante: detenemos el bucle una vez encontrada la clase
        }
    }
});