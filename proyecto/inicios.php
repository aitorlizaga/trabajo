<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio sesión</title>
    <link rel="stylesheet" href="css/diseño.css">
</head>
<body>
    <h3>Inició con éxito!</h3>
    <?php
    // Iniciar sesión
    if (isset($_REQUEST["usuario"]) && isset($_REQUEST["contra"])) {
        // Hemos recibido todo bien

        // 2. Recojo los parámetros
        $usuario = $_REQUEST["usuario"];
        $contra = $_REQUEST["contra"];

        session_start();

        $_SESSION["usuario"] = $usuario;
        $_SESSION["contra"] = $contra;

        // 3. Conexión a la base de datos
        $conn = new mysqli("localhost", "root", "", "aitor_tienda");

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // 4. Consulta SQL para obtener el usuario y la contraseña hash
        $sql = "SELECT * FROM usuarios WHERE nombre = '$usuario'";
        $result = $conn->query($sql);

        // Si el usuario existe
        if ($result->num_rows > 0) {
            // Obtener los datos del usuario
            $row = $result->fetch_assoc();

            // Verificar la contraseña
            if (password_verify($contra, $row["contraseña"])) {
                // Contraseña correcta, redirigir a la página de compra
                header("Location: paginacompra.php");
                session_start();
                $_SESSION["error"] = 0; // Si quieres establecer algún tipo de mensaje de éxito, puedes hacerlo aquí
            } else {
                // Contraseña incorrecta
                header("Location: principal.php");
                session_start();
                $_SESSION["error"] = 1; // Error de contraseña incorrecta
            }
        } else {
            // Si no existe el usuario
            header("Location: principal.php");
            session_start();
            $_SESSION["vacio"] = 1; // Usuario no encontrado
        }

        $conn->close();
    } else {
        // No se recibieron los parámetros correctamente
        session_start();
        header("Location: principal.php");
        $_SESSION["vacio"] = 1; // Parámetros vacíos
    }
    ?>
</body>
</html>
