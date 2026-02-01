<?php
class Controller {
    private $gestor;
    public function __construct($gestor){
        $this->gestor=$gestor;
    }
    public function index(){
        $elementos=$this->gestor->obtenerTodos();
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
            $this->gestor->guardar($nuevo);
        }
        header("Location:index.php");
        include "views/crear.php";
        exit;
        
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
                $_POST['id'],
                $_POST['nombre'],
                $_POST['planetaOrigen'],
                $_POST['nivelEstabilidad'],
                $_POST['atributoEspecial']
            );

            header("Location: index.php");
            exit;
        }

        include "views/editar.php";
    }
}

