<!DOCTYPE html>
<html>
<head>
    <title>Registrar Entidad Estelar</title>
</head>
<body>
    <h1>Registrar Nueva Entidad</h1>

    <form method="POST" action="index.php?accion=crear">
        
        Nombre:<br>
        <input type="text" name="nombre" required><br><br>

        Planeta de origen:<br>
        <input type="text" name="planetaOrigen" required><br><br>

        Nivel de Estabilidad (1-10): <br>
        <input type="number" name="nivelEstabilidad" min="1" max="10" required><br><br>

        Tipo de Entidad:<br>
        <select name="tipo" required>
            <option value="FormaDeVida">Forma de Vida</option>
            <option value="MineralRaro">Mineral Raro</option>
            <option value="Artefacto">Artefacto</option>
        </select><br>

        <div class="grupo-especifico">
            <p><i>Rellena solo el campo que corresponda al tipo seleccionado arriba:</i></p>
            
            Dieta (para Forma de Vida): <br>
            <input type="text" name="dieta"><br><br>

            Dureza (para Mineral Raro): <br>
            <input type="number" step="0.1" name="dureza"><br><br>

            Antigüedad (para Artefacto): <br>
            <input type="number" name="antiguedad">
        </div>
        <br>
        <button type="submit">Guardar Hallazgo</button>
    </form>
    <br>
    <a href="index.php">Volver al inicio</a>
    
</body>
</html>
