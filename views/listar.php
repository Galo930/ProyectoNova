<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
  }
  th, td {
    padding: 10px; 
  }</style>
</head>
<body>
    <h2> Elementos</h2>
    <a href="index.php?accion=crear">Crear nuevo elemento</a>

    <table>
        <th>ID</th>
        <th>Nombre</th>
        <th>Planeta de Origen</th>
        <th>Nivel de Estabilidad</th>
        <th>Atributo Especial
        <th>Acciones</th>
    <?php foreach($_SESSION['Elemento'] as $elemento):?>
        <tr>
            <td><?php echo $elemento->getId() ?></td>
            <td><?php echo $elemento->getNombre() ?></td>
            <td><?php echo $elemento->getplanetaOrigen() ?></td>
            <td><?php echo $elemento->getnivelEstabilidad() ?></td>
            <td>
                <?php 
                if ($elemento instanceof Artefacto){
                    echo "Antiguedad: " . $elemento->getAntiguedad();
                } elseif ($elemento instanceof MineralRaro){
                    echo "Dureza: " . $elemento->getDureza();
                } elseif ($elemento instanceof FormaDeVida){
                    echo "Dieta: " . $elemento->getDieta();
                }
                ?>
            <td>
                <a href="index.php?accion=editar&id<? echo getId()?>">Editar</a>
                <a href="index.php?accion=eliminar<? echo getId()?>">Eliminar</a>
                <a href="index.php?accion=reaccionar">Reaccionar</a>
        </tr>
    <?php endforeach;?>
    </table>
</body>
</html>

<?php 