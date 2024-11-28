<?php
// Comprobamos si el usuario está en la sesión
session_start(); // Asegúrate de iniciar la sesión
echo $_SESSION['usuario'];
if (!isset($_SESSION['usuario'])) {
    // Si no está logueado, redirigimos al login
    header("Location: principal.php");
    exit;
}

// Variables del usuario
$usuario = $_SESSION['usuario']; 

$conn = new mysqli("localhost", "root", "", "aitor_tienda");

// Obtener los productos del carrito desde la base de datos
$sql_carrito = "SELECT * FROM carrito WHERE usuario = '$usuario'";
$result = $conn->query($sql_carrito);
// Verificar si hay productos en el carrito
if ($result->num_rows > 0) {
    // Recorrer cada producto en el carrito y guardarlo en la tabla 'compras'
    while ($producto = $result->fetch_assoc()) {
        $productoID = $producto['producto_id'];  // ID del producto
        $prodnombre = $producto['producto'];    // Nombre del producto
        $cantidad = $producto['cantidad'];      // Cantidad en el carrito
        $precio = $producto['total']; 
        $usuario_id = $producto['usuario_id'];          // Precio del producto
        $total = $precio * $cantidad;           // Precio total para esa cantidad

        // Realizar la inserción de cada producto en la tabla 'compras'
        $sql_insert = "INSERT INTO compras (id_cliente, id_producto, producto, canitdad_carrito, precio_total) 
         VALUES ('$usuario_id', '$productoID', '$prodnombre', '$cantidad', '$total')";

        if ($conn->query($sql_insert) === FALSE) {
            exit;

        }
    }

    // Después de insertar, eliminamos los productos del carrito
    $sql_delete = "DELETE FROM carrito WHERE usuario = '$usuario'";

    if ($conn->query($sql_delete) === TRUE) {
        // Redirigir al área personal con el carrito vacío
        header("Location: miarea.php");
        exit;
    } else {
        echo "Error al vaciar el carrito: " . $conn->error;
        exit;
    }
} else {
    // Si el carrito está vacío
    echo "El carrito está vacío.";
}

$conn->close();

?>
