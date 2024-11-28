<?php
// Iniciar sesión
session_start();

// Verificar si el usuario está logueado
 /* if (!isset($_SESSION['nombre'])) {
    // Si no está logueado, redirigimos al login
    header("Location:principal.php");
    exit;
}
*/
// Conectar a la base de datos
$conn = new mysqli("localhost", "root", "", "aitor_tienda");

// Comprobar si hubo un error en la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si se ha enviado el ID del producto para eliminar
if (isset($_POST['producto'])) {
    $producto = $_POST['producto'];

    // Eliminar el producto del carrito
    $sql = "DELETE FROM carrito WHERE producto = '$producto'";

    if ($conn->query($sql) === TRUE) {
        // Si la eliminación fue exitosa, redirigimos de vuelta al perfil del usuario
        header("Location: miarea.php");
        exit;
    } else {
        echo "Error al eliminar el producto: " . $conn->error;
    }
} else {
    // Si no se ha enviado el ID del producto, redirigimos a la página de perfil
    header("Location: miarea.php");
    exit;
}

$conn->close();
?>
