<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../proyecto/css/diseño.css">
    <title>Página Principal</title>
</head>
<body>
    <div class="menu">
    <h3>Página Principal</h3>
    <a href="miarea.php"><button>Mi perfil</button></a> 
    <a href="deslog.php"><button>Cerrar sesion</button></a>
    </div>
    <h1>Carrito</h1>
    <?php
    session_start();
    // Verificar si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    // Si no está logueado, redirigimos al login
    header("Location: principal.php");
    exit;
}

        $conn = new mysqli("localhost", "root", "", "aitor_tienda");

        // Obtener todos los productos del carrito
        $sql = "SELECT * FROM carrito WHERE usuario = '" . $_SESSION['usuario'] . "'";
        $result = $conn->query($sql);

        // Mostrar todos los productos del carrito
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Producto</th>";
        echo "<th>Cantidad</th>";
        echo "<th>Precio (€)</th>";
        echo "</tr>";
        $precio_total = 0; 
        $cantidad_total = 0; 
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['producto'] . "</td>";
            echo "<td>" . $row['cantidad'] . "</td>";
            echo "<td>" . $row['total'] . " €</td>";
            echo "</tr>";
            $precio_total += $row['total'];
            $cantidad_total += $row['cantidad'];
        }
        
        echo "<th>Total (€)</th>";
        echo "<th>" . $cantidad_total . " </th>";
        echo "<th>" . $precio_total . " € </th>";
        

        echo "</table>";
        
    ?>
    <h1>Productos.</h1>
    <div class='productos-contenedor'>
   <form action="carrito.php" method="GET">
   <div class='producto'>
        <img src="https://applaws.pet/wp-content/uploads/2024/10/4304.webp" width="180px" /> 
        <input id="producto" type="hidden" name="productoID" value="0"/>
        <p>Applaws Comida Seca Completa Natural de Pollo con Salmón para Gatos - 37.00€:</p><br>
        <input id="cantidad" type="number" name="cantidad" placeholder="Cantidad"   min="0"  />
        <input type="submit" value="Agregar al carrito" />
        </div>
    </form>
    <form action="carrito.php" method="GET">
    <div class='producto'>
        <input id="producto" type="hidden" name="productoID" value="2"/>
        <img src="https://m.media-amazon.com/images/I/71SlR7DULhL._AC_SX679_PIbundle-12,TopRight,0,0_SH20_.jpg" width="180px"/>
        <p>Applaws 100% Natural Comida Húmeda para Gatos - 12.00€</p>
        <br>
        <input id="cantidad" type="number" name="cantidad" placeholder="Cantidad"   min="0"/>
        <input type="submit" value="Agregar al carrito" />
        </div> 
    </form>
    <form action="carrito.php" method="GET">
    <div class='producto'>
        <input id="producto" type="hidden" name="productoID" value="3"/>
        <img src="https://m.media-amazon.com/images/I/61Xz9KZKdXL._AC_SY550_.jpg" width="180px" />
        <p>Cat's Best 29734 - Arena para gatos - 16.00€</p>
        <br>
        <input id="cantidad" type="number" name="cantidad" placeholder="Cantidad"   min="0" />
        <input type="submit" value="Agregar al carrito" />  
        </div>  
    </form>
</body>
</html>