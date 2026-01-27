<!DOCTYPE html>
<html>
<head>
    <title>Reistrar entidad estelar</title>
</head>
<body>
    <h1>Registrar entidad estelar</h1>

    <form method="POST">
        Nombre:<br>
        <input type="text" name="nombre" required><br><br>

        Planeta de origen:<br>
        <input type="text" name="planetaOrigen" required><br><br>

        Nivel de Estabilidad (1-10): <br>
        <input type="number" name="nivelEstabilidad" min="1" max="10" required><br><br>

        <select name="tipo" id="tipo" onchange="actualizarFormulario()" required>
            <option value="">Selecciona un tipo...</option>
            <option value="FormaDeVida">Forma de Vida</option>
            <option value="MineralRaro">Mineral Raro</option>
            <option value="Artefacto">Artefacto</option>
        </select><br><br>

        <div id="campo_FormaDeVida" class="especifico">
            Dieta (Carbono, Silicio, Energía): <br>
            <input type="text" name="dieta"> 
        </div>

        <div id="campo_MineralRaro" class="especifico">
            Dureza (Escala de Mohs): <br>
            <input type="number" step="0.1" name="dureza"> 
        </div>

        <div id="campo_Artefacto" class="especifico">
            Antigüedad (Años luz): <br>
            <input type="number" name="antiguedad"> 
        </div>
        <br>

        <button type="submit">Guardar</button>
    </form>

    <br>
    <a href="index.php">Volver</a>
</body>
</html>
