<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Entidad</title>
   <link rel="stylesheet" href="helpers/estilos.css">
</head>
<body>
    <h2> Editar Elemento</h2>

    <form method="POST" action="index.php?accion=editar&id=<?php echo $elemento->getId() ?>">
        
        Nombre:<br>
        <input type="text" name="nombre" value="<?php echo $elemento->getNombre() ?>" required><br><br>

        Planeta de origen:<br>
        <input type="text" name="planetaOrigen" value="<?php echo $elemento->getPlanetaOrigen() ?>" required><br><br>

        Nivel de Estabilidad (1-10): <br>
        <input type="number" name="nivelEstabilidad" min="1" max="10" value="<?php echo $elemento->getNivelEstabilidad() ?>" required><br><br>

        Tipo de Entidad:<br>
        <select name="tipo" required>
            <option value="FormaDeVida" <?php if ($elemento instanceof FormaDeVida) echo 'selected'; ?>>Forma de Vida</option>
            <option value="MineralRaro" <?php if ($elemento instanceof MineralRaro) echo 'selected'; ?>>Mineral Raro</option>
            <option value="Artefacto" <?php if ($elemento instanceof Artefacto) echo 'selected'; ?>>Artefacto</option>
        </select><br>

        <div class="grupo-especifico">
            <p><i>Rellena solo el campo que corresponda al tipo seleccionado arriba:</i></p>
            
            Dieta (para Forma de Vida): <br>
            <input type="text" name="dieta" value="<?php if ($elemento instanceof FormaDeVida) echo $elemento->getDieta(); ?>"><br><br>

            Dureza (para Mineral Raro): <br>
            <input type="number" step="0.1" name="dureza" value="<?php if ($elemento instanceof MineralRaro) echo $elemento->getDureza(); ?>"><br><br>

            Antigüedad (para Artefacto): <br>
            <input type="number" name="antiguedad" value="<?php if ($elemento instanceof Artefacto) echo $elemento->getAntiguedad(); ?>">
        </div>
        <br>
        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>