<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../proyecto/css/diseño.css">
    <link rel="icon" href="../proyecto/imagenes/icon.png" type="image/png">
</head>
<body>
    <form   method="POST">
        <div class="menu">
        <div class='titulo'>
        <h1>Resgistrate</h1>
        </div>
        <p>Nombre : </p>
        <input type="var" name="name">
        <p>Contraseña: </p>
        <input type="var" name="contra" require >
        </div>
        <input type="submit">
    </form>
    
</body>
<?php
session_start();

// Mostrar mensajes de sesión
if (isset($_SESSION["name"])) {
    echo "Usuario ya existe.";
    unset($_SESSION["name"]); 
    // Limpiar el mensaje después de mostrarlo
}
if (isset($_SESSION["vacio"])) {
    echo "¡Todos los campos son obligatorios!";
    unset($_SESSION["vacio"]);
}

// Verificar si el formulario se ha enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $usuario = $_POST['name'];
    $contras = $_POST['contra'];
    $contra = password_hash($contras, PASSWORD_BCRYPT);
    $_SESSION['contra']=$contra;
    $_SESSION['usuario']=$usuario;
    // Validar que no estén vacíos
    if (empty($usuario) || empty($contra)) {
        $_SESSION["vacio"] = "1";
        header("Location: registro.php");
        exit();
    }

    // Conectar a la base de datos
    $conn = new mysqli("localhost", "root", "", "aitor_tienda");


    // Verificar si el nombre de usuario ya existe
    $sql = "SELECT * FROM usuarios WHERE nombre = '$usuario'";
    $result = $conn->query($sql);

    // Si el usuario ya existe
    if ($result->num_rows > 0) {
        $_SESSION["name"] = "1";
        $conn->close();
        header("Location: registro.php");
        exit();
    }

    // Insertar el nuevo usuario en la base de datos
    $insert_sql = "INSERT INTO usuarios (nombre, contraseña) VALUES ('$usuario', '$contra')";
    if ($conn->query($insert_sql) === TRUE) {
        header("Location: paginacompra.php");
        exit();
    } else {
        header("Location: registro.php");
        exit();
    }

    // Cerrar la conexión
    $conn->close();
}
?>




</html>