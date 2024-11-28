<?php
// Inicio sesión
session_start();

// Comprobamos si el usuario  está en la sesión
if (!isset($_SESSION['usuario'])) {
    // Si no está logueado, redirigimos al login
    header("Location: principal.php");
    exit;
}

$usuario = $_SESSION['usuario']; // Usuario logueado

// Creo el array de sesión para el carrito
$productocompra = array();

// Comprobamos que ya había algo en el carrito en la sesión
if (isset($_SESSION["carrito"])) {
    $productocompra = $_SESSION["carrito"];
}

// Verificamos que nos llega el producto y la cantidad
if (isset($_REQUEST["productoID"]) && isset($_REQUEST["cantidad"])) {
    $productoID = $_REQUEST["productoID"];
    $cantidad = $_REQUEST["cantidad"];

    // Verificamos si el producto ya existe en el carrito
    if (isset($productocompra[$productoID])) {
        // Si ya existe, sumamos la cantidad al valor actual en el carrito
        $productocompra[$productoID] += $cantidad;
    } else {
        // Si no existe, lo agregamos con la cantidad
        $productocompra[$productoID] = $cantidad;
    }

    // Actualizamos el carrito en la sesión
    $_SESSION["carrito"] = $productocompra;
  





    // Conectar a la base de datos
    $conn = new mysqli("localhost", "root", "", "aitor_tienda");

    // pillamos la id de usuario

    $sql = "SELECT id FROM usuarios WHERE nombre = '$usuario' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $_SESSION['usuario_id'] = $row['id'];
    $usuario_id = $_SESSION['usuario_id'] ;


    $sql = "SELECT nombre FROM productos WHERE id = '$productoID' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $_SESSION['prodnombre'] = $row['nombre'];
    $prodnombre = $_SESSION['prodnombre'] ;

    // Obtener el precio del producto desde la tabla productos
    $sql_precio = "SELECT precio FROM productos WHERE id = '$productoID'";
    $result_precio = $conn->query($sql_precio);

        $row = $result_precio->fetch_assoc();
        $precio_unitario = $row['precio'];

        // Calcular el total (precio * cantidad)
        $total = $precio_unitario * $cantidad;

        // Verificar si el producto ya está en el carrito de este usuario


        $sql_check = "SELECT * FROM carrito WHERE usuario_id = '$usuario_id' AND producto_id = '$productoID'";
        $result_check = $conn->query($sql_check);

        
        if ($result_check && $result_check->num_rows > 0) {
            // Si el producto ya existe, actualizar la cantidad y el total
            $row_check = $result_check->fetch_assoc();
            $sql_update = "UPDATE carrito SET cantidad = cantidad + $cantidad, total = total + $total WHERE producto_id = '$productoID' ";
            if ($conn->query($sql_update) === TRUE) {
                // Si la actualización fue exitosa
            } else {
                echo "Error al actualizar el carrito: " . $conn->error;
            }
        } else {
            // Si el producto no está en el carrito, insertarlo
            $sql_insert = "INSERT INTO carrito (producto, usuario, usuario_id, producto_id, cantidad, total ) VALUES ( '$prodnombre', '$usuario', '$usuario_id', '$productoID', '$cantidad', '$total' )";
            if ($conn->query($sql_insert) === TRUE) {
                // Si la inserción fue exitosa
            } else {
                echo "Error al insertar en el carrito: " . $conn->error;
            }
        }

        // Redirigir al carrito o página de compra
        header("Location: paginacompra.php");
        exit; // Asegúrate de usar `exit` después de `header()` para detener el script aquí.

    } 
    else {
        echo "Producto no encontrado en la base de datos.";
    }

    $conn->close();


?>
