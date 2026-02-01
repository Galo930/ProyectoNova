<!DOCTYPE  html>
<html lang="es" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explorador de Entidades Estelares</title>
</head>
<body>
    <h1>Explorador de Entidades Estelares</h1>
    <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>ORIGEN</th>
            <th>ESTABILIDAD</th>
            <th>ATRIBUTO ESPECIAL</th>
            <th>REACCIÓN</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($hallazgosPaginados as $entidad): ?>
            <tr class="<?= $entidad->getNivelEstabilidad() < 3 ? 'alerta-roja' : '' ?>">
                <td><?= $entidad->getId() ?></td>
                <td><?= $entidad->getNombre() ?></td>
                <td><?= $entidad->getPlanetaOrigen() ?></td>
                <td><?= $entidad->getNivelEstabilidad() ?>/10</td>
                <td>
                    <?php
                    if ($entidad instanceof Artefacto) {
                        echo "Antigüedad: " . $entidad->getAntiguedad();
                    } elseif ($entidad instanceof MineralRaro) {
                        echo "Dureza: " . $entidad->getDureza();
                    } elseif ($entidad instanceof FormaDeVida) {
                        echo "Dieta: " . $entidad->getDieta();
                    }
                    ?>
                <td><?= $entidad->reaccionar() ?></td> 
                <td>
                    <a href="index.php?action=eliminar&id=<?= $entidad->getId() ?>" class="btn-expulsar">EXPULSAR</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

    <div class="paginacion">
        <?php if ($paginaActual > 1): ?>
            <a href="index.php?action=explorar&pagina=<?= $paginaActual - 1 ?>">Anterior</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
            <?php if ($i == $paginaActual): ?>
                <strong><?= $i ?></strong>
            <?php else: ?>
                <a href="index.php?action=explorar&pagina=<?= $i ?>"><?= $i ?></a>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if ($paginaActual < $totalPaginas): ?>
            <a href="index.php?action=explorar&pagina=<?= $paginaActual + 1 ?>">Siguiente</a>
        <?php endif; ?>
    </div>

    <br>
    <a href="index.php">Volver</a>