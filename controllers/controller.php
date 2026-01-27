<?php
class Controller {
    private $gestor;

    public function __construct(iGestor $gestor) {
        $this->gestor = $gestor; // Inyección de dependencias [cite: 9]
    }

    public function explorar() {
        $todos = $this->gestor->obtenerTodos();
        
        // Configuración de Paginación [cite: 29]
        $porPagina = 5; 
        $totalHallazgos = count($todos);
        $totalPaginas = ceil($totalHallazgos / $porPagina);
        $paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
        $inicio = ($paginaActual - 1) * $porPagina;

        // Variables que la vista necesita para no dar error
        $hallazgosPaginados = array_slice($todos, $inicio, $porPagina);
        
        include 'views/Explorador.php';
    }

    public function guardar($entidad) {
        if ($_POST) {
            $tipo = $_POST['tipo'];
            $id = $_POST['id'] ?? uniqid();
            $nombre = $_POST['nombre'];
            $planeta = $_POST['planetaOrigen'];
            $estabilidad = $_POST['nivelEstabilidad'];

            // Lógica dinámica para instanciar la clase correcta [cite: 33, 34]
            if ($tipo === 'FormaDeVida') {
                $entidad = new FormaDeVida($id, $nombre, $planeta, $estabilidad, $_POST['dieta']);
            } elseif ($tipo === 'MineralRaro') {
                $entidad = new MineralRaro($id, $nombre, $planeta, $estabilidad, $_POST['dureza']);
            } else {
                $entidad = new Artefacto($id, $nombre, $planeta, $estabilidad, $_POST['antiguedad']);
            }

            $this->gestor->guardar($entidad);
            header("Location: index.php?action=explorar");
        }
    }
}