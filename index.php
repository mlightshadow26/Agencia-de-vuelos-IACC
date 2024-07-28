<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACCESO</title>
</head>
<body>

    <form action="usuario.php" method="post">  <h2>Iniciar sesión</h2>  <label for="name">Nombre:</label>
       
        <input type="text" id="name" name="name" required><br><br>

        <label for="username">Nombre de usuario:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Acceder</button>
    </form>


</body>
</html>