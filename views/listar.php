<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Elementos</title>
    <link rel="stylesheet" href="helpers/estilos.css">
</head>
<body>
    <h2>Elementos</h2>
    <a href="index.php?accion=crear">Crear nuevo elemento</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Planeta de Origen</th>
                <th>Nivel de Estabilidad</th>
                <th>Atributo Especial</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($elementos)): ?>
                <?php foreach($elementos as $elemento): ?>
                    <tr>
                        <td><?php echo $elemento->getId(); ?></td>
                        <td><?php echo $elemento->getNombre(); ?></td>
                        <td><?php echo $elemento->getplanetaOrigen(); ?></td>
                        <td><?php echo $elemento->getnivelEstabilidad(); ?></td>
                        <td>
                            <?php 
                            if ($elemento instanceof Artefacto) {
                                echo "Antigüedad: " . $elemento->getAntiguedad();
                            } elseif ($elemento instanceof MineralRaro) {
                                echo "Dureza: " . $elemento->getDureza();
                            } elseif ($elemento instanceof FormaDeVida) {
                                echo "Dieta: " . $elemento->getDieta();
                            }
                            ?>
                        </td>
                        <td>
                            <a href="index.php?accion=editar&id=<?php echo $elemento->getId(); ?>">Editar</a>
                            <a href="index.php?accion=eliminar&id=<?php echo $elemento->getId(); ?>" onclick="return confirm('¿Seguro?')">Eliminar</a>
                            <a href="index.php?accion=reaccionar&id=<?php echo $elemento->getId(); ?>">Reaccionar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="6">No hay elementos para mostrar.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="paginador">
        <p>Página <?php echo $paginaActual; ?> de <?php echo $totalPaginas; ?></p>
        <nav>
            <?php if ($paginaActual > 1): ?>
                <a href="index.php?accion=index&page=<?php echo $paginaActual - 1; ?>">« Anterior</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                <a href="index.php?accion=index&page=<?php echo $i; ?>" 
                   style="<?php echo ($i == $paginaActual) ? 'font-weight: bold; text-decoration: underline;' : ''; ?>">
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>

            <?php if ($paginaActual < $totalPaginas): ?>
                <a href="index.php?accion=index&page=<?php echo $paginaActual + 1; ?>">Siguiente »</a>
            <?php endif; ?>
        </nav>
    </div>
</body>
</html>