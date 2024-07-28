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

// (IACC)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
</head>
<body>
    <h1>Reservas</h1>



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['plan'])) {
    $plan = $_POST['plan'];

    if ($plan == "Plan 1") {
        $id_cliente = 1;
        $fecha_reserva = date('Y-m-d');
        $id_vuelo = 1;
        $id_hotel = 1;
        $sql_cliente = "SELECT * FROM CLIENTE";
        
        $result_cliente = mysqli_query($conn, $sql_cliente);


        if ($result_cliente) {
        $row = mysqli_fetch_assoc($result_cliente);
        if ($row) {  
            $sql_nombre_cliente = $row['nombre'];
        } else {
            echo "No cliente encontrado";
        }
        } else {
        echo "Error al ejecutar la consulta: " . mysqli_error($conn);
        }




        $sql_reserva = "INSERT INTO RESERVA (id_cliente, fecha_reserva, id_vuelo, id_hotel) 
                        VALUES ('$id_cliente', '$fecha_reserva', '$id_vuelo', '$id_hotel')";

        if (mysqli_query($conn, $sql_reserva)){
            echo "Reserva exitosa; Plan 1 <br>";
            echo "Su vuelo y su hotel han sido reservados sr.$sql_nombre_cliente";
        } else {
            echo "Error al reservar" . mysqli_error($conn);
        }
    } else {
        echo "Sr. $sql_nombre_cliente, su plan no se encuentra disponible.<br>";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['plan'])) {
    $plan = $_POST['plan'];

    if ($plan == "Plan 1") {
        $id_cliente = 1;
        $fecha_reserva = date('Y-m-d');
        $id_vuelo = 2;
        $id_hotel = 2;

        $sql_reserva = "INSERT INTO RESERVA (id_cliente, fecha_reserva, id_vuelo, id_hotel) 
                        VALUES ('$id_cliente', '$fecha_reserva', '$id_vuelo', '$id_hotel')";

        if (mysqli_query($conn, $sql_reserva)){
            echo "Reserva exitosa; Plan 2 <br>";
            echo "Se asoció el vuelo ID 2 con el hotel ID 2";
        } else {
            echo "Error al reservar" . mysqli_error($conn);
        }
    } else {
        echo "Plan no reconocido.<br>";
    }
}



?>

<a href="usuario.php">Volver!</a>
</body>
</html>
