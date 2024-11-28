<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra</title>
</head>
<body>
    <?php
    session_start();

    // Agregar productos al carrito
    if (isset($_GET['producto'])) {
        foreach ($_GET['producto'] as $tipo => $cant) {
            if (!isset($_SESSION["carrito"][$tipo])) {
                $_SESSION["carrito"][$tipo] = 0;
            }
            $_SESSION["carrito"][$tipo] += (int)$cant;
        }
    }

    // Eliminar producto específico
    if (isset($_GET['eliminar'])) {
        $tipoEliminar = $_GET['eliminar'];
        unset($_SESSION["carrito"][$tipoEliminar]);
    }

    // Vaciar carrito
    if (isset($_GET['vaciar'])) {
        unset($_SESSION["carrito"]);
    }

    // Mostrar carrito
    if (isset($_SESSION["carrito"]) && !empty($_SESSION["carrito"])) {
        echo "<h2>Carrito de Compras</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Producto</th><th>Cantidad</th><th>Eliminar</th></tr>";

        foreach ($_SESSION["carrito"] as $tipo => $cant) {
            echo "<tr>
                    <td>$tipo</td>
                    <td>$cant</td>
                    <td><a href='?eliminar=$tipo'>Eliminar</a></td>
                  </tr>";
        }
        echo "</table>";
        echo '<p><a href="?vaciar=true"><button>Vaciar Carrito</button></a></p>';
    } else {
        echo "<p>El carrito está vacío.</p>";
    }
    ?>

    <h1>Elige que producto quieres comprar.</h1>
    <form action="carrito.php" method="get">
        <div>
            <h3>Comida de gato (20€ unidad):</h3>
            <img src="https://www.mundohuella.com/22660-large_default/applaws-cat-kitten-pollo.jpg" width="120px" />
            <input type="number" name="producto[Comida]" min="0" />
        </div>
        <div>
            <h3>Arena de gato (10€ unidad):</h3>
            <img src="https://m.media-amazon.com/images/I/517qnjlShEL._AC_.jpg" width="100px" />
            <input type="number" name="producto[Arena]" min="0" />
        </div>
        <div>
            <h3>Lata de gato (5€ unidad):</h3>
            <img src="https://media.zooplus.com/bilder/4/800/413216_pla_applaws_cattin_24x70g_chickenbreast_hs_01_4.jpg" width="120px" />
            <input type="number" name="producto[Lata]" min="0" />
        </div>
        <input type="submit" value="Agregar al carrito" />
    </form>
</body>
</html>