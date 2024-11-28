<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi área</title>
    <link rel="stylesheet" href="../proyecto/css/diseño.css">
    <link rel="icon" href="../proyecto/imagenes/icon.png" type="image/png">
</head>
<body>
<div class="menu">
<div class='titulo'>
    <h1>Estás en tu perfil</h1>
</div>
    <a href="paginacompra.php"><button>Principal</button></a>
    <a href="deslog.php"><button>Cerrar sesión</button></a>
    <a href="compra.php"><button>Terminar compra</button></a>
</div>

<?php
    session_start(); // Inicia sesión al principio

    if (isset($_SESSION['usuario'])) {
        // Mostrar contenido según el tipo de usuario
        if ($_SESSION['usuario'] == 'admin') {
            echo "<div class='titulo'>";
            echo "<h2>Bienvenido, admin</h2>";
            echo "</div>";
            echo "<div class='admin'>";
            echo "<img class='tien' src='imagenes/tien.gif' width='200px'></img>";
            echo "</div>";

            $conn = new mysqli("localhost", "root", "", "aitor_tienda");

            // Obtener todos los productos del carrito
            $sql = "SELECT * FROM carrito";
            $result = $conn->query($sql);
            echo "<div class='titulo'>";
            echo "<h2>Carrito de usuarios</h2>";
            echo "</div>";
            // Mostrar todos los productos del carrito en una tabla
            echo "<table border='1' style='width: 100%; text-align: center; border-collapse: collapse;'>";
            echo "<tr>";
            echo "<th>Usuario</th>";
            echo "<th>ID Carrito</th>";
            echo "<th>Producto</th>";
            echo "<th>Cantidad</th>";
            echo "<th>Total (€)</th>";
            echo "<th>Acciones</th>";
            echo "</tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['usuario'] . "</td>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['producto'] . "</td>";
                echo "<td>" . $row['cantidad'] . "</td>";
                echo "<td>" . $row['total'] . " €</td>";
                echo "<td>";
                // Botón para eliminar el producto
                echo '<form action="eliminar_producto.php" method="POST" style="display: inline;">
                        <input type="hidden" name="producto" value="' . $row['producto'] . '">
                        <button type="submit" name="eliminar_producto">Eliminar</button>
                      </form>';
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";

            // Mostrar los usuarios registrados
            echo "<div class='titulo'>";
            echo "<h2>Usuarios registrados</h2>";
            echo "</div>";
            $sql_users = "SELECT * FROM usuarios"; // Asegúrate de que la tabla de usuarios se llame 'usuarios' o ajusta el nombre
            $result_users = $conn->query($sql_users);

            // Mostrar usuarios en una tabla
            echo "<table border='1' style='width: 100%; text-align: center; border-collapse: collapse;'>";
            echo "<tr>";
            echo "<th>ID Usuario</th>";
            echo "<th>Nombre de Usuario</th>";
            echo "<th>Acciones</th>";
            echo "</tr>";

            while ($row_user = mysqli_fetch_assoc($result_users)) {
                echo "<tr>";
                echo "<td>" . $row_user['id'] . "</td>"; // Asumiendo que hay un campo 'id_usuario'
                echo "<td>" . $row_user['nombre'] . "</td>"; // Asumiendo que hay un campo 'nombre_usuario'
                echo "<td>";
                // Botón para eliminar el usuario
                echo '<form action="eliminarusu.php" method="POST" style="display: inline;">
                         <input type="hidden" name="id_usuario" value="' . $row_user['id'] . '">
                         <button type="submit" name="eliminar_usuario">Eliminar Usuario</button>
                       </form>';
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
            
            // Mostrar todas las compras de todos los usuarios si eres admin
            echo "<div class='titulo'>";
            echo "<h2>Compras realizadas</h2>";
            echo "</div>";
            $sql_compras = "SELECT * FROM compras"; // Obtén todas las compras
            $result_compras = $conn->query($sql_compras);

            // Mostrar las compras en una tabla
            echo "<table border='1' style='width: 100%; text-align: center; border-collapse: collapse;'>";
            echo "<tr>";
            echo "<th>ID Compra</th>";
            echo "<th>ID Cliente</th>";
            echo "<th>Producto</th>";
            echo "<th>Cantidad</th>";
            echo "<th>Precio Total (€)</th>";
            echo "<th>Fecha</th>";
            echo "</tr>";

            while ($row_compra = mysqli_fetch_assoc($result_compras)) {
                echo "<tr>";
                echo "<td>" . $row_compra['id'] . "</td>";
                echo "<td>" . $row_compra['id_cliente'] . "</td>";
                echo "<td>" . $row_compra['producto'] . "</td>";
                echo "<td>" . $row_compra['canitdad_carrito'] . "</td>";
                echo "<td>" . $row_compra['precio_total'] . " €</td>";
                echo "<td>" . $row_compra['fecha_compra'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            // Si el usuario no es admin
            echo "<h2>Bienvenido, " . $_SESSION['usuario'] . "</h2>";
            $conn = new mysqli("localhost", "root", "", "aitor_tienda");

            // Obtener todos los productos del carrito para el usuario
            $sql = "SELECT * FROM carrito WHERE usuario = '" . $_SESSION['usuario'] . "'";
            $result = $conn->query($sql);

            // Mostrar los productos del carrito en una tabla
            $precio_total = 0; // Variable para calcular el total del carrito
            echo "<table border='1' style='width: 100%; text-align: center; border-collapse: collapse;'>";
            echo "<tr>";
            echo "<th>Producto</th>";
            echo "<th>Cantidad</th>";
            echo "<th>Total por Producto (€)</th>";
            echo "<th>Acciones</th>";
            echo "</tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['producto'] . "</td>";
                echo "<td>" . $row['cantidad'] . "</td>";
                echo "<td>" . $row['total'] . " €</td>";
                echo "<td>";
                // Botón para eliminar el producto
                echo '<form action="eliminar_producto.php" method="POST" style="display: inline;">
                        <input type="hidden" name="producto" value="' . $row['producto'] . '">
                        <button type="submit" name="eliminar_producto">Eliminar</button>
                      </form>';
                echo "</td>";
                echo "</tr>";

                // Acumulamos el total
                $precio_total += $row['total'];
            }

            // Mostrar el precio total del carrito
            echo "</table>";
            echo "<h3>Precio total del carrito: " . $precio_total . " €</h3>";


            echo "<h3>Compras realizadas</h3>";
            $sql_compras = "SELECT * FROM compras"; // Obtén todas las compras
            $result_compras = $conn->query($sql_compras);

            // Mostrar las compras en una tabla
            echo "<table border='1' style='width: 100%; text-align: center; border-collapse: collapse;'>";
            echo "<tr>";
            echo "<th>Producto</th>";
            echo "<th>Cantidad</th>";
            echo "<th>Precio Total (€)</th>";
            echo "<th>Fecha</th>";
            echo "</tr>";

            while ($row_compra = mysqli_fetch_assoc($result_compras)) {
                echo "<tr>";
                echo "<td>" . $row_compra['producto'] . "</td>";
                echo "<td>" . $row_compra['canitdad_carrito'] . "</td>";
                echo "<td>" . $row_compra['precio_total'] . " €</td>";
                echo "<td>" . $row_compra['fecha_compra'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    } else {
        // Si no hay sesión iniciada, se muestra un mensaje
        echo "<h1>Por favor, inicia sesión para ver tu perfil.</h1>";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
 
?>
<form action="vaciarcarrito.php" method="POST" style="text-align: center; margin-top: 20px;">
    <button type="submit" name="vaciar_carrito">Vaciar Carrito</button>
</form>
</body>
</html>
