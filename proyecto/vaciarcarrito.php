<?php 
session_start();
// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    // Si no está logueado, redirigimos al login
    header("Location: principal.php");
    exit;
}

// Conectar a la base de datos
$conn = new mysqli("localhost", "root", "", "aitor_tienda");

$usuario = $_SESSION['usuario']; // Usuario logueado

// Eliminar todos los productos del carrito para el usuario logueado
$sql = "DELETE FROM carrito WHERE usuario = '$usuario'";

if ($conn->query($sql) === TRUE) {
    // Redirigir al área personal con el carrito vacío
    header("Location: miarea.php"); // Asegúrate de cambiar este nombre si tu archivo es diferente
    exit;
} 
$conn->close();
session_destroy();

header("Location:paginacompra.php");

?>