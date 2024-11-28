<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra</title>
</head>
<?php
session_start();
//var_dump($_SESSION);
if(isset($_SESSION["carrito"])){
    $productoscompra= $_SESSION["carrito"];
    foreach ($productoscompra as $tipo => $cant){
    echo "
    <table>
    <tr>
    <td>Carrito</td>
    </tr>
    <tr>
    <td>Producto </td>
    <td>Cantidad </td>
    <td>Eliminar producto </td>
    </tr>
    <tr>
    <td>$tipo </td>
    <td>$cant </td>
    <td><a href='eliminarprod.php?producto=$tipo'><button>Eliminar</button></a></td>
    </tr>
    </table> "
    ;}
}
else{
    echo "<p>  El carrito está vacio </p>";
}
echo '<p><a href="vaciarcarrito.php"><button>Vaciar carro</button></a></p>';




?>

<body>
    <h1>Elige que producto quieres comprar.</h1>
<form action="carrito.php" method="get">
    <a style="font-size: 20px;">Comida de gato:</a></br>
    <input id="producto" type="hidden" name="producto" value="comida"/>
        <img src="https://www.mundohuella.com/22660-large_default/applaws-cat-kitten-pollo.jpg" width="120px" /></br>
        <a>Cantidad (20€ unidad): </a>
        <input type="number" name="cantidad"   ></a></br></br>
    <a style="font-size: 20px;">Arena de gato:</a></br>
    <input id="producto" type="hidden" name="producto" value="arena"/>
        <img src="https://m.media-amazon.com/images/I/517qnjlShEL._AC_.jpg" width="100px" /></br>
        <a>Cantidad (10€ unidad): </a>
        <input type="number" name="cantidad"   ></a></br></br>
    <a style="font-size: 20px;">Lata de gato:</a></br>
    <input id="producto" type="hidden" name="producto" value="lata"/>
        <img src="https://media.zooplus.com/bilder/4/800/413216_pla_applaws_cattin_24x70g_chickenbreast_hs_01_4.jpg" width="120px" /></br>
        <a>Cantidad (5€ unidad): </a>
        <input type="number" name="cantidad" ></a></br></br>
    <input type="submit"/>
</form>


</body>
</html>