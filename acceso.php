<?php
session_start();

$servername = "localhost";
$database = "AGENCIA";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Fallo de conexión: " . mysqli_connect_error());
}
echo "Conexión exitosa";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso</title>
</head>
<body>
    <h1>AGENCIA BD</h1>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Datos del vuelo
    $origen_vuelo = $_POST["origen_vuelo"];
    $destino_vuelo = $_POST["destino_vuelo"];
    $fecha_vuelo = $_POST["fecha_vuelo"];
    $plazas_disponibles = $_POST["plazas_disponibles"];
    $precio = $_POST["precio"];
    
    // Insertar vuelo
    $sql_vuelo = "INSERT INTO VUELO (origen, destino, fecha, plazas_disponibles, precio) 
                  VALUES ('$origen_vuelo', '$destino_vuelo', '$fecha_vuelo', '$plazas_disponibles', '$precio')";

    if (mysqli_query($conn, $sql_vuelo)) {
        echo "Vuelo registrado exitosamente.<br>";
    } else {
        echo "Error al registrar el vuelo: " . mysqli_error($conn) . "<br>";
    }

    // Datos de hoteles
    $nombre_hotel = $_POST["nombre_hotel"];
    $ubicacion_hotel = $_POST["ubicacion_hotel"];
    $piezas_disponibles = $_POST["piezas_disponibles"];
    $tarifa_noche = $_POST["tarifa_noche"];
    
    // Insertar hotel
    $sql_hotel = "INSERT INTO HOTEL (nombre, ubicacion, habitaciones_disponibles, tarifa_noche) 
                  VALUES ('$nombre_hotel', '$ubicacion_hotel', '$piezas_disponibles', '$tarifa_noche')";

    if (mysqli_query($conn, $sql_hotel)) {
        echo "Hotel registrado exitosamente.<br>";
    } else {
        echo "Error al registrar el hotel: " . mysqli_error($conn) . "<br>";
    }
} else {
    echo "No se enviaron datos por POST";
}

?>

<a href="index.php">Volver a ingresar para ingresar otro destino y hotel</a>
<h3>Vuelos y Hoteles disponibles</h3>
<?php

$sql_vuelos = "SELECT * FROM VUELO";
$result_vuelos = mysqli_query($conn, $sql_vuelos);

// Consulta para obtener los hoteles
$sql_hoteles = "SELECT * FROM HOTEL";
$result_hoteles = mysqli_query($conn, $sql_hoteles);

?>

<h3>Vuelos disponibles</h3>
<table border="1">
    <tr>
        <th>Origen</th>
        <th>Destino</th>
        <th>Fecha</th>
        <th>Plazas disponibles</th>
        <th>Precio</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($result_vuelos)) {
        echo "<tr>";
        echo "<td>" . $row['origen'] . "</td>";
        echo "<td>" . $row['destino'] . "</td>";
        echo "<td>" . $row['fecha'] . "</td>";
        echo "<td>" . $row['plazas_disponibles'] . "</td>";
        echo "<td>" . $row['precio'] . "</td>";
        echo "</tr>";
    }
    ?>
</table>

<h3>Hoteles disponibles</h3>
<table border="1">
    <tr>
        <th>Nombre</th>
        <th>Ubicación</th>
        <th>Habitaciones disponibles</th>
        <th>Tarifa por noche</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($result_hoteles)) {
        echo "<tr>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['ubicacion'] . "</td>";
        echo "<td>" . $row['habitaciones_disponibles'] . "</td>";
        echo "<td>" . $row['tarifa_noche'] . "</td>";
        echo "</tr>";
    }
    ?>
</table>

<h3>Reserva un vuelo y un hotel</h3>
<h4>Planes disponibles</h4>
<form method="post" action="reservas.php">
    <input type="submit" name="plan" value="Plan 1">
    <input type="submit" name="plan" value="Plan 2">

</form>



<?php
mysqli_close($conn);
?>

<a href="index.php">Volver a página principal. Click Aquí!</a>
</body>
</html>