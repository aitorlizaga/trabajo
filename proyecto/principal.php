<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../proyecto/css/diseño.css">
    <link rel="icon" href="../proyecto/imagenes/icon.png" type="image/png">
    <title>Página Principal</title>
</head>
<body>

    <form method="GET" action="inicios.php">
    <label for="usuario">Nombre de usuario:</label>
    <input type="text" name="usuario" id="usuario" required>
    <label for="contra">Contraseña:</label>
    <input type="password" name="contra" id="contra" required>
    <button type="submit" name="login">Iniciar sesión</button>
    </form>
    <a href="registro.php"><button>Registrarse</button></a>
</body>
    <?php
    session_start(); 
    $conn = new mysqli("localhost", "root", "", "aitor_tienda");

    // Consulta para obtener los productos
    $sql1 = "SELECT * FROM productos";
    $result = $conn->query($sql1);

    // enseñar los productos
    echo "<div class='tarjeta-contenedor'>";  // Abrir el contenedor principal de tarjetas
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='tarjeta' style='margin-bottom: 20px;'>";
        echo  "<img src='". $row['imagen'] ."' width='100' />";
        echo "<br>";
        echo "<p>" . $row['nombre'] . " - " . $row['precio'] . "€</p>";
        echo "</div>";  // Cerrar la tarjeta
    }
    echo "</div>";  // Cerrar el contenedor principal de tarjetas
    
    $conn->close();

    ?>
    <a href="script.php"><button>Crear tablas</button></a>
</body>
</html>
