<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["name"];
    $usuario = $_POST["username"];
    $contrasena = $_POST["password"];

    $usuario_inscrito = "usuario1";
    $contrasena_inscrita = "contrasena1";

    if ($usuario == $usuario_inscrito && $contrasena == $contrasena_inscrita) {
        $_SESSION["usuario"] = $usuario;
        $_SESSION["nombre"] = $nombre;

        echo "Acceso a $nombre, Bienvenid@.";
    } else {
        echo "Credenciales inválidas, intente nuevamente.";
    }

} else {
    echo "Acceso denegado";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
</head>
<body>
    <form action="acceso.php" method="post">    <h2>Acceso Privilegiado</h2>
    <p>Ingrese, por favor, al menos 3 vuelos y 3 hoteles.</p>
        <h3>Vuelos</h3>
            <label for="origen_vuelo">Origen</label>
            <input type="text" id="origen_vuelo" name="origen_vuelo" required><br><br>
            <label for="destino_vuelo">Destino</label>
            <input type="text" id="destino_vuelo" name="destino_vuelo" required><br><br>
            <label for="fecha_vuelo">Fecha</label>
            <input type="date" id="fecha_vuelo" name="fecha_vuelo" required><br><br>
            <label for="plazas_disponibles">Plazas disponibles</label>
            <input type="text" id="plazas_disponibles" name="plazas_disponibles" required><br><br>
            <label for="precio">Precio</label>
            <input type="text" id="precio" name="precio" required><br><br>
            
        <h3>Hoteles</h3>
        
            <label for="nombre_hotel">Nombre</label>
            <input type="text" id="nombre_hotel" name="nombre_hotel" required><br><br>
            <label for="ubicacion_hotel">Ubicación</label>
            <input type="text" id="ubicacion_hotel" name="ubicacion_hotel" required><br><br>
            <label for="piezas_disponibles">Piezas disponibles</label>
            <input type="text" id="piezas_disponibles" name="piezas_disponibles" required><br><br>
            <label for="tarifa_noche">Tarifa Noche</label>
            <input type="text" id="tarifa_noche" name="tarifa_noche" required><br><br>
            
        <button type="submit">Ingresar</button>
    </form>
<h3>Ir a acceso y revisar reservas</h3>
<a href="acceso.php">Haz click aquí!</a>
</body>
</html>