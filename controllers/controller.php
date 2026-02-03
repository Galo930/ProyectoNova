<?php
class Controller {
    private $gestor;
    public function __construct($gestor){
        $this->gestor=$gestor;
    }
    public function index() {
    $pagina = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($pagina < 1){
        $pagina = 1;
    }
    $datosPaginados = $this->gestor->obtenerPorPagina($pagina, 5);
    $elementos = $datosPaginados['items'];
    $totalPaginas = $datosPaginados['totalPaginas'];
    $paginaActual = $datosPaginados['paginaActual'];

    include "views/listar.php";
}
    public function crear(){
        if ($_SERVER['REQUEST_METHOD']==='POST'){
            $id=uniqid();
            switch($_POST['tipo']){
                case 'Artefacto':
                    $nuevo= new Artefacto(
                        $id,
                        $_POST['nombre'],
                        $_POST['planetaOrigen'],
                        $_POST['nivelEstabilidad'],
                        $_POST['antiguedad']
                    );
                     break;
                    case 'FormaDeVida':
                    $nuevo= new FormaDeVida(
                        $id,
                        $_POST['nombre'],
                        $_POST['planetaOrigen'],
                        $_POST['nivelEstabilidad'],
                        $_POST['dieta']
                    );
                     break;
                    case 'MineralRaro':
                    $nuevo= new MineralRaro(
                        $id,
                        $_POST['nombre'],
                        $_POST['planetaOrigen'],
                        $_POST['nivelEstabilidad'],
                        $_POST['dureza']
                    );
                     break;
            }
            if ($nuevo){
            $this->gestor->guardar($nuevo);
            }
                    header("Location: index.php");
        exit;
        }
        include "views/crear.php";

    }

    public function editar(){
         $id = $_GET['id'] ?? null;
        $elemento = $this->gestor->Buscar($id);

        if (!$elemento) {
            echo "Elemento no encontrado";
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $this->gestor->Editar(
                $id,
                $_POST['nombre'],
                $_POST['planetaOrigen'],
                $_POST['nivelEstabilidad'],
                $_POST['antiguedad'] ?? "",
                $_POST['dureza'] ?? "",
                $_POST['dieta'] ?? ""
            );

            header("Location: index.php");
            exit;
        }
    
                include "views/editar.php";
    }

    public function reaccionar() {
        $id = $_GET['id'] ?? null;
        $elemento = $this->gestor->buscar($id);
            if ($elemento && $elemento instanceof iInteractuable) {
                    $mensaje = $elemento->reaccionar();
                    echo "<h1>Interacción:</h1>";
                    echo "<p>" . $mensaje . "</p>";
                    echo "<a href='index.php'>Volver al listado</a>";
            } else {
                    echo "Este objeto no es interactuable o no existe.";
            }

    }

    public function eliminar(){
        $id = $_GET['id'] ?? null;
        $this->gestor->eliminar($id);
        header("Location: index.php");
        exit;
    }
}

